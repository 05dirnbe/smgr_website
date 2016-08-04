<!DOCTYPE html>

<html lang="en">

<?php include('head.php'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
        });
        $('.collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
        });
    });
</script>

<style>
    body {
        padding-top: 30px;
    }

    .faq-cat-content {
        margin-top: 25px;
    }

    .faq-cat-tabs li a {
        padding: 15px 10px 15px 10px;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        color: #777777;
    }

    .nav-tabs li a:focus,
    .panel-heading a:focus {
        outline: none;
    }

    .panel-heading a,
    .panel-heading a:hover,
    .panel-heading a:focus {
        text-decoration: none;
        color: #777777;
    }

    .faq-cat-content .panel-heading:hover {
        background-color: #efefef;
    }

    .active-faq {
        border-left: 5px solid #888888;
    }

    .panel-faq .panel-heading .panel-title span {
        font-size: 13px;
        font-weight: normal;
    }

</style>

<body>
<div class="container" style="">
    <div class="row">
        <div class="col-md-6">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs faq-cat-tabs">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">General</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Using data</a></li>
                <li><a href="#faq-cat-3" data-toggle="tab">Sharing data</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-1">
                                    <h4 class="panel-title">
                                        Why use the SMGR?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    The impact of data sharing as a scientific practice is ever increasing.
                                    The SMGR seeks to promote data reuse by enabling reproduction of results. It may
                                    also act as a catalyst for new research efforts. Making your data accessible for
                                    everyone renders it more visible and potentially increases its impact beyond initial
                                    publication, possibly beyond its domain of origin. As the impact of your hard-earned
                                    data grows, your impact grows.
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-11">
                                    <h4 class="panel-title">
                                        What kind of data can I expect to find in the SMGR?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-11" class="panel-collapse collapse">
                                <div class="panel-body">
                                    In the SMGR you will find data revolving around networks formed by slime molds.
                                    At present this includes images of such networks and equivalent graph
                                    representations.
                                    To get an overview on the data sets available, feel free to browse them here.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-12">
                                    <h4 class="panel-title">
                                        How may SMGR data be reused?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-12" class="panel-collapse collapse">
                                <div class="panel-body">
                                    SMGR data may be reused in any way, provided license agreements and terms of use of
                                    individual
                                    data sets are observed. Reuse includes reproduction of known results as well as the
                                    realization
                                    of new data analysis approaches evolving previously unexplored research questions.
                                    When browsing
                                    data sets also look for documents indicating open research questions suggested by
                                    the contributors
                                    of the sets.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-14">
                                    <h4 class="panel-title">
                                        What quality level can I expect of the data?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-14" class="panel-collapse collapse">
                                <div class="panel-body">
                                    You can expect the data in the SMGR to be of research grade quality.
                                    All data is part of some scholarly publication and underwent a peer-review process.
                                    We thus trust the involved expert reviewers to ensure that the quality of the data
                                    is on par with the standards of its field of origin.
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-17">
                                    <h4 class="panel-title">
                                        I’d like to follow the development of the SMGR. Can you keep me up to data
                                        please?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-17" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Absolutely! Feel free to subscribe to the SMGR mailing list. We will announce
                                    updates and
                                    additions to the SMGR via this <a href="https://lists.mpi-inf.mpg.de/listinfo/smgr">website</a>.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-18">
                                    <h4 class="panel-title">
                                        My question is not on this list, how can I contact you?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-18" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Feel free to contact us <a href="contact.php">here</a>.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-19">
                                    <h4 class="panel-title">
                                        I’d like to see the SMGR grow. What can I do to help?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-19" class="panel-collapse collapse">
                                <div class="panel-body">
                                    That’s great there are a couple of things that you can do. Consider sharing data if
                                    possible
                                    and tell your colleagues about this repository and its data.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="faq-cat-2">
                    <div class="panel-group" id="accordion-cat-2">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-15">
                                    <h4 class="panel-title">
                                        How to I get SMGR data?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-15" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Simply go to our data set page, browse, select and download. Depending on the size
                                    of the data you
                                    want to download and the speed of your Internet connection the required amount of
                                    patience may vary.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-13">
                                    <h4 class="panel-title">
                                        How do I cite SMGR data?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-13" class="panel-collapse collapse">
                                <div class="panel-body">
                                    At present data sets in the SMGR are not citable entities.
                                    Please cite the scholarly publication the data set is associated with.
                                    Thus the original contributors are credited. Appropriate information
                                    can be found on the contributor’s page. In addition to that, you are welcome to cite
                                    the SMGR itself to give some credit to us.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-9">
                                    <h4 class="panel-title">
                                        Are there any costs associated to sharing via the SMGR?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    No, given the current small size and low maintenance of the SMGR, any fees are
                                    inappropriate.
                                    The operation of the SMGR is funded by Kurt Mehlhorn and the MPI for Informatics.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="faq-cat-3">
                    <div class="panel-group" id="accordion-cat-2">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-2">
                                    <h4 class="panel-title">
                                        What kind of data does the SMGR accept?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Currently the SMGR accepts all data that is concerned with networks formed by slime
                                    molds.
                                    This includes images of slime molds networks and graphs of the same in particular
                                    but is not limited to them.
                                    Such data can take various forms and we do not enforce any given file formats as to
                                    not restrict the flexibility
                                    of the repository. However, we ask contributors to adhere to the standards of their
                                    fields.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-3">
                                    <h4 class="panel-title">
                                        I am considering a submission, but I am not sure whether my data is interesting
                                        to the SMGR. What can I do?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    If you are in doubt, simply contact us. We can discuss your data and find out
                                    whether
                                    it is a good fit for the SMGR. Contacting us early helps us to coordinate and help
                                    you throughout
                                    the submission process.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-4">
                                    <h4 class="panel-title">
                                        What should a submission contain?
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>We aim to encourage reuse of existing data resulting in increased credit for
                                        original work.
                                        To facilitate this, it is important that submitted data is well documented and
                                        in a format the
                                        community commonly uses. Submitters are encouraged to provide data and
                                        descriptive information
                                        such that another researcher would be able to evaluate previous findings based
                                        on submitted data.
                                        This includes raw data as well as any data derived from it. In general
                                        submission should include
                                        the following:</p>
                                    <ul>
                                        <li>A statement naming the authors, relevant publications the data was used in,
                                            how-to-cite,
                                            additional information as well as license agreement if applicable.
                                        </li>
                                        <li>A concise summary of the contents of the set. The scope and relevance of the
                                            data should become
                                            clear immediately without reading the details.
                                        </li>
                                        <li>A detailed description of the contents of the set. This is aimed at people
                                            interested
                                            in the details.
                                        </li>
                                        <li>A detailed description of the materials and methods used produce the set. We
                                            welcome
                                            instructions that go beyond your average "Materials and Methods" sections.
                                        </li>
                                        <li>The dataset itself. For bigger datasets consisting of several subsets, a
                                            structured
                                            tree-like origination is advised as it will facilitate browsing and
                                            downloading
                                            the data lateron.
                                        </li>
                                        <li>Programs and code used to process or analyze the set.</li>
                                        <li>Relevant suggestions of what could be done with the data in the future.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-5">
                                        <h4 class="panel-title">
                                            What about the quality of my submission?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        We expect submitted data to be part of some peer-reviewed scholarly publication.
                                        We trust that involved expert reviewers make sure that the data was produced
                                        according
                                        to relevant standards.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-6">
                                        <h4 class="panel-title">
                                            I have prepared a submission and am ready to submit. What happens next?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Please let us know that you are ready. You will have to decide whether you want
                                        us
                                        to host
                                        your data on our servers, or whether you prefer us to put up a link to your
                                        server
                                        hosting the data.
                                        In the second case it suffices to provide us with the link and some relevant
                                        descriptive information.
                                        In the second case we will provide you with a link that enables us to upload you
                                        data for us to host.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-20">
                                        <h4 class="panel-title">
                                            What happens to my data after submission? Do I have to give up control over
                                            my
                                            data?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-20" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        After submission we will check whether your data is complete and sufficiently
                                        documented.
                                        If this is the case, we will add it to the data sets available via the SMGR
                                        project
                                        page.
                                        People will then be able to browse and download easily from there.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-7">
                                        <h4 class="panel-title">
                                            Can I retract my data from the SMGR?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        At any point in time your data remains your data and you can instruct us to
                                        remove
                                        it from the SMGR.
                                        This could be appropriate for example, if something was discovered that renders
                                        the
                                        data erroneous.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-8">
                                        <h4 class="panel-title">
                                            Is the data in the SMGR being backed up?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-8" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        The data contained in the SMGR will be integrated in the back-up system of our
                                        institute.
                                        Thus, a couple of hard-drives failing will not affect the integrity of the SMGR.

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-16">
                                        <h4 class="panel-title">
                                            Are there any costs associated to using data contained in the SMGR?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-16" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Due to the small size of the SMGR, there are no costs for its users.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-10">
                                        <h4 class="panel-title">
                                            Why are there no features such automatic submission system?
                                            <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>
                                <div id="faq-cat-1-sub-10" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        The answer is, that the SMGR as it stands is simply too small to warrant such
                                        efforts.
                                        Given the very countable size of the research community interested in slime mold
                                        networks,
                                        it is probably foolish to expect a large amount of contributors out of the blue.
                                        As
                                        a result,
                                        the number of datasets will likely not exceed large numbers in the near future.
                                        Given these
                                        assumptions, features commonly found in larger repositories, such as automatic
                                        upload processes,
                                        are simply overkill at the moment. However, such features may well be added in
                                        the
                                        future provided
                                        appropriate growth of the SMGR and associated community feedback. Even large
                                        repositories
                                        have started small.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
