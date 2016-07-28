#!/usr/bin/perl

use warnings;
use strict;
use CGI;
use Cwd;
use Cwd 'abs_path';
use Archive::Zip qw(:ERROR_CODES :CONSTANTS);
use File::Spec;

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
my $root_path = '/root/smgr/smgr_website//';
my $GOOD_ROOT = "/root/smgr/smgr_website/data";

#my $root_path = '/opt/lampp/htdocs/smgr_website//';
#my $GOOD_ROOT = "/opt/lampp/htdocs/smgr_website/data";


=comment
print "Content-Type: text/html\n\n";
print "
    <TITLE>CGI script ! Python</TITLE>
    <H1>This is my first CGI script</H1>
    Hello, world!";
print "<p>$paths</p>";
=cut

my @path_array = split(',', $paths);

=comment 
foreach my $f (@path_array) {
    my $test = File::Spec->catdir($root_path, $f);
    print "<p>$test</p>"; 
}


my $zip = Archive::Zip->new();
my $member = $zip->addFile($root_path.'/data/root/jstree.json', 'jstree.json');
$member->desiredCompressionMethod(COMPRESSION_STORED);
=cut

# build zip
my $zip = Archive::Zip->new();
foreach my $f (@path_array) {
    # todo - > security check
    #my $real_path = File::Spec->realpath($f);
    if(-d $f) {
        next;
    }
    if(is_target_within_path($f, $GOOD_ROOT)) {
        my $path = File::Spec->catdir($root_path, $f);
        my $member = $zip->addFile($path , $f);
        $member->desiredCompressionMethod(COMPRESSION_STORED);  
    }
}


# output
print "Content-Type: application/x-zip\n";
print "Content-Disposition: attachment; filename=download.zip\n";
#header("Content-length: " . strlen($zipcontents) . "\n\n");
print "\n";

$zip->writeToFileHandle(\*STDOUT);

exit(0);  


