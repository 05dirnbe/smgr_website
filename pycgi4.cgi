#!/usr/bin/perl

use warnings;
use strict;
use CGI;
use CGI ':standard';
use Archive::Zip qw(:ERROR_CODES :CONSTANTS);
use File::Spec;
use File::Spec 'rel2abs';

my $query = new CGI;

my $paths = $query->param('paths');
my $root_path = '/opt/lampp/htdocs/smgr_website//';
my $ROOT = '/opt/lampp/htdocs/smgr_website/data//' ;  # wherever

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
    my $user_path = param($f);
    my $absolute  = rel2abs($user_path, $ROOT);

    if ($absolute =~ /^\Q$ROOT/) {
   # $absolute is probably within $ROOT, so process it
        if (open(INF, "< $absolute")) {
      # it's here, do whatever
        } else {
            exit(0);
        }
    } else {
       exit(0);
    }
    if(-d $f) {
        next;
    }
    my $path = File::Spec->catdir($root_path, $user_path);
    my $member = $zip->addFile($path , $user_path);
    $member->desiredCompressionMethod(COMPRESSION_STORED);
}



# output
print "Content-Type: application/x-zip\n";
print "Content-Disposition: attachment; filename=download.zip\n";
#header("Content-length: " . strlen($zipcontents) . "\n\n");
print "\n";

$zip->writeToFileHandle(\*STDOUT);

exit(0);  