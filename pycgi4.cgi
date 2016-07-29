#!/usr/bin/perl

use warnings;
use strict;
use CGI;
use Cwd;
use Cwd 'abs_path';
use File::Spec;
use Archive::Zip::SimpleZip qw($SimpleZipError);

# Check if given $target path is sub path of $path
sub is_target_within_path{
    my ($target,$path) = @_;
    my $absolute_target = abs_path($target);

    # print "target:", $target, "\n";
    # print "absolute_target:", $absolute_target, "\n";
    # print "path:", $path, "\n";

    # check whether the absolute path is a subpath of the allowed path
    if ($absolute_target =~ /^\Q$path/) {
       # $absolute_target is probably within $path, so process it
       if (open(INF, "< $absolute_target")) {
            # print "it's here, do whatever\n";
            return 1;
       } else {
          # absolute_target is valid, but not found
          # print "404 not found\n";
          return 0;
       }
    } else {
       # catch any attempt to manipulate the path
       # print "ERROR - They've tried to ../ their way out\n";
       return 0;
    }
}

my $query = new CGI;

my $paths = $query->param('paths');
my $root_path = '/local/smgr.mpi-inf.mpg.de//';
my $GOOD_ROOT = '/local/smgr.mpi-inf.mpg.de/data';

# for local debug purpose
#my $root_path = 'C:/xampp/htdocs/smgr_website//';
#my $GOOD_ROOT = 'C:/xampp/htdocs/smgr_website/data';
my $data_path = '/data/root/';
my $cut_length = length($data_path) - 1;	

# convert sting to array
my @path_array = split(',', $paths);

# build zip
my $zipData ;
my $z = new Archive::Zip::SimpleZip '-',
                        Stream => 1, 
                        Zip64 => 1
        or die "$SimpleZipError\n" ;

        # output    
print "Content-Type: application/x-zip\n";
print "Content-Disposition: attachment; filename=download.zip\n";
print "\n";

#my $zip = Archive::Zip->new();
foreach my $f (@path_array) {
    # todo - > security check
    #my $real_path = File::Spec->realpath($f);
    if(-d $f) {
        next;
    }
    if(is_target_within_path($f, $GOOD_ROOT)) {
        my $path = File::Spec->catdir($root_path, $f);
        $f = substr($f, $cut_length);
        $z->add($path, Name => $f);
    }
} 

$z->close();
exit(0);  


