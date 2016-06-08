<!DOCTYPE html>

<html lang="en">

<? include('head.php'); ?>

<body>

  <div class="container">
    <!-- Main component for a primary marketing message or call to action -->
   
    <h1>Frequently Asked Questions</h1>

    <h3>I am considering a submission, but I am not sure whether this is a good idea?</h3>

    <p>If you have data and you are not sure whether it should be shared via the SMGR or not, let us simply talk about it. We will be happy to talk about your data, discuss how it could be useful and help you decide whether you want to submit it or not. Simply contact us.</p>

    <h3>What file formats does the SMGR accept?</h3>

    <p>We do not enforce any restrictions on the used file formats, but ask contributors to adhere to community standars where they exist. We also recommend the usage of formats that allow quick and easy processing of data. In particular we encourage submitters to avoid proprietary and binary file formats.</p>


    <h3>What should my submission contain?</h3>

    <p>We aim to encourage reuse of existing data resulting in increased credit for original work. To facilitate this, it is important that submitetd data is well-documented and in a format that is commonly used by the community. Submitters are encouraged to provide data and descirptive information such that another resarcher would be able to evaluate previous findings based on submitted data. In general this includes raw data as well as any data derived from it.</p>

    <p>Short and informative file names help improve</p>

    <ul>
     <li> A statement naming the authors, relevant publications the data was used in, how-to-cite, additional information as well as license agreement if applicable. </li>
     <li> A concise summary of the contents of the set. The scope and relevance of the data should be made clear.</li>
     <li> A detailed description of the contents of the set.</li>
     <li> A detailed description of the materials and methods used produce the set.</li>
     <li> The dataset itself. For bigger datasets consisting of several subsets, a structured origination is advised.</li>
     <li> Programs and code used to process the set.</li>
     <li> Relevant suggestions of what could be done with the set.</li>
    </ul>
    
    <p>For general guidance on how to prepare data for submission, submitters may wish to consult DataONE and the following publication: White EP, Baldridge E, Brym ZT, Locey KJ, McGlinn DJ, Supp SR (2013) Nine simple ways to make it easier to (re)use your data. Ideas in Ecology & Evolution 6(2):1–10. http://doi.org/10.4033/iee.2013.6b.6.f</p>

    <h3>How do I submit my data?</h3>

    <p>So you have prepared a dataset and decided to share it? Simply contact us via email and we will proceed from there. There is two options: You can either host the data on your servers and we will link it accordingly from the SMGR or we will host the data on our servers. In the latter case we will provide you with an upload link for your data.</p>


    <h3 id="question_1">What kind of data can I find in this repository?</h3>

    <p>At present we envision this repository to contain high-quality, research-grade experimental data revolving around slime molds. Alongside the actual data we expect meta-data describing the what, where, when and how of data collection. Furtheremore additional useful data items, e.g. analysis code or suggested usage of the data are welcome. A contribution to the SMGR should be as self-contained as possible and contain all the information needed to reproduce it.</p>

    <h3 id="question_2">What quality level can I expect of the data?</h3>

    <p>In this repository we aim to collect data and links to data that are up to scientific standards. That is data that has been or is going to be the foundation of some peer-reviewed scientific publication. As a result, expect most of the data in this repository to highly specialized.</p>

    <h3 id="question_3">Is this repository limited to data that can be turned into graphs?</h3>

    <p>The short answer is: For now it is.</p>

    <p>The long answer is more complicated since we do not know how this repository is going to be received by the scientific community. If there is a strong feedback and people are approaching us with various types of high quality data we are more than willing to adapt the scope of the repository.</p>

    <h3 id="question_4">Why should I contribute to this repository?</h3>

    <p>To increase the visibility and value of your data as well as to improve the reproducibility of your results.</p>

    <h3 id="question_5">I do have some data I want to contribute. Can you host my data for me?</h3>

    <p>Absolutely, its good to see that you are willing to trust us with you valuable data (keep a backup though). Please contact us in order to discuss your contribution.</p>

    <h3 id="question_6">Do I have to give up control over my data?</h3>

    <p>Not necessarily, you are always the owner of your data. If you don't want your data on our servers, then just provide them on your own web-space and submit the associated links to us.</p>

    <h3 id="question_7">Is there a downside to me contributing?</h3>

    <p>Well, making your data public carries the risk of someone else coming up with a brilliant idea of how to use it that didn't occur to you. However, you will still be credited as the origin of the data.</p>

    <h3 id="question_8">Can I simply download and use the data I find here?</h3>

    <p>Yes you can, that is about the whole point. However, do give appropriate credit to the original contributor of the data as required by the rules of good scientific practice. Mentioning this repository is not mandatory, but highly recommended.</p>

    <h3 id="question_9">I'd like to follow the development of this repository. How can you keep me up to date?</h3>

    <p>Simply sign up to our mailing list. It will be used to distribute announcements of new data being added or other important changes about the repository.</p>

    <h3 id="question_10">My question is not on the list! How can I reach you?</h3>
     <p>By all means do <a href="contact.html">contact</a> us. This whole project is just in its infancy and we have never done something remotely like it. Hence it is to be expected that we forget about all kinds of important issues. Please to point them out to us. Any sort of help or suggestions are highly appreciated.</p>

    

  </div><!-- /container -->
  <script src="js/expandy.min.js"></script>
    <script>
        $('.container').makeExpander({
            toggleElement: 'h3',
            jqAnim: true,
            showFirst: false,
            accordion: true,
            speed: 400,
            indicator: 'triangle'
        });
    </script>
  <? include('footer.php'); ?>
</body>
</html>
