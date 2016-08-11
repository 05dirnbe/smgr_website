#!/usr/bin/perl

use CGI;
use strict;
use warnings;

# read the CGI params
my $cgi = CGI->new;
my $firstname = $cgi->param("paths");
my $name = $cgi->param("os");

print "Content-type: text/html\n\n";

print "Hello, world!\n";
