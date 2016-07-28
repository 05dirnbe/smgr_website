#!C:\xampp\perl\bin\perl.exe
#!/usr/bin/perl

use warnings;
use strict;
use CGI;
use Cwd;
use Cwd 'abs_path';
use Archive::Zip qw(:ERROR_CODES :CONSTANTS);
use File::Spec;

my $query = new CGI;

my $paths = $query->param('paths');
my $root_path = 'C:\xampp\htdocs\smgr_website\\';

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
my $member = $zip->addFile($root_path.'\data\root\jstree.json', 'jstree.json');
$member->desiredCompressionMethod(COMPRESSION_STORED);
=cut

# build zip
my $zip = Archive::Zip->new();
foreach my $f (@path_array) {
    # todo - > security check
    #my $real_path = File::Spec->realpath($f);
    my $path = File::Spec->catdir($root_path, $f);
    my $member = $zip->addFile($path , $f);
    $member->desiredCompressionMethod(COMPRESSION_STORED);
}


# output
print "Content-Type: application/x-zip\n";
print "Content-Disposition: attachment; filename=\"download.zip\"\n";
#header("Content-length: " . strlen($zipcontents) . "\n\n");
print "\n";

$zip->writeToFileHandle(\*STDOUT);

exit(0);  