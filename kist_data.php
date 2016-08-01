
<!DOCTYPE html>

<html lang="en">
<?php include('head.php'); ?>

<body>

  <div class="container">
  
    <h1>Kist Europe Data Set</h1>

    <p>Contributed by Tim Mehlhorn of the Korea Insitute of Technology Europe and Michael Dirnberger of the Max Planck Institute for Informatics.</p>

    <p>The full data set consists of 90 subsets. Each subset consittutes a timeseries of a large number of images taken during wet-lab experiments as described below. Out of the 90 datasets 40 show P. polycephalum developing a well formed network suitable for automatic image processing and graph extraction. The remaining 50 sets show various other scenarios such as the slime mold reversing growth direction at some point, showing irregular development of the growth front or even escaping the container after some time. While this data cannot be turned into graphs, it may prove useful in some other context in the future and is thus contained in the KIST data set.</p>

    <p><strong>Note: Note that the size of the full dataset is approximately 500 GB. Consider using the browsing function to zoom in on folders and download what is interesting to you in smaller chunks.</strong></p>

    <h2>Experiments</h2>

    <p>For the cultivation of P. polycephalum (HU195xHU200) we gratefully received dried sclerotia from Prof. T. Ueda of Hokkaido University. The plasmodium was grown on a 20 cm x 30 cm rectangular translucent plastic dish on top of a layer of 1.25 % agar (Kobe I). 1.5 g of dried sclerotia crumbs were lined up along the short edge of the dish. This concludes the preparation of the dish.</p>

    <p>To facilitate the capturing of image sequences we opted for bright field illumination using a negatoscope, also known as X-ray film viewer (Planilux, 2 x 15 W). While the device uses more or less the full spectrum of visible light, it provides reliable illumination that is spatially and temporally constant. By simply putting the translucent dish on top of the device we ensure optimal contrast and eliminate all sources of reflections or shadows in the images. This is a vital step, as it helps the graph extraction software to achieve optimal results.</p>

    <p>To take the actual images we fixed a digital camera (Canon EOS 645D. Lens EFS 18-55 mm) perpendicular to the negatoscope, centered at about 16 cm above the agar gel. As a result we captured an area of 10 cm x 15 cm in our images. Since P. polycephalum is sensitive to light, the whole setup was placed in a large light-proof wooden box 110 cm x 110 cm 110 cm. Temperature and humidity inside the box were kept constant at 22 °C and 55-60 % relative humidity.</p>

    <p>Lastly we took care of triggering the camera every 2 minutes using software (Motion detection software; Vulpessoft,  DSLR Master). To minimize the time P. polycephalum needs to be exposed to light we coupled the camera triggering with the switch of the negatoscope, making sure that the light was only on for one second every 2 minutes. Thus we minimize any detrimental effects caused by using the full spectrum of white light.</p>

    <p>Next we describe how to produce dried sclerotia. To do so we cultivate plasmodia in the dark on a 1 % Agargel in a 22 cm x 32 cm plastic dish at 20-22 °C. During the exploration of the surface, P. polycephalum is fed with oat flakes (Blütenzarte Köllnflocken) every 4-6 hours until the whole dish is covered. Next, we transfer parts of the gel using a small spatula with the overgrown oat flakes to a new 22 cm x 32 cm dish prepared with agar gel, placing a string of gel pieces with the overgrown oat flakes at the very edge of the box exclusively. We proceed by letting the plasmodium cover the new dish, while feeding with oat flakes from time to time. Transferring to the new dish can be omitted if it is not necessary as it serves only to keep the growth of P. polycephalum going in order to ensure continuing production of sclerotia. If the growth of P. polycephalum seems to have come to an unintentional halt at some point, we recommend making sure it is not to dry and to carefully moisten the organism a bit using distillate water and common plant sprayer.</p>

    <p>The remaining contents of the old overgrown gel can now be moved to 40 cm high a 25 cm wide bucket. The bottom of the bucket is covered with tissue paper. The walls of the bucket are covered with moistened filter paper. After a while the plasmodia grow up the bucket wall settling on the filter paper. As soon as a large part of the filter paper is occupied by P. polycephalum it can be taken out and wrapped up to let it dry in a cardboard box. After drying for approximately 3 days, the cell mass is dry and in the state of sclerotia.</p>

    <p>We cordially thank Prof. T. Ueda for teaching us how to effectively cultivate P. polycephalum.</p>

    <h2>Graph Extraction</h2>

    <p>For graph extraction we rely on a software tool called <a href="http://nefi.mpi-inf.mpg.de/">NEFI</a>. Using this tool an image of physarum can be analyzed returning the depicted network in form of a weighted undirected graph. After comparing the results obtained with the different algorithms available, the best option, offering the most faithful graph representation preserving as much information as possible, was selected and stored as a so-called pipeline. In order to obtain good results with this tool, the input image must be preprocessed and void of strong color gradients. Due to the unpredictable growth of P. polycephalum, satisfying this constraint can be challenging.</p>

    <p>In order to meet this requirement we did the following: First we visually inspected each and every single image of every sequence in order to decide on the region of interest and the exact subsequence of images suitable for processing with NEFI. Naturally, since we are interested in studying the networks supporting the front, we discarded all image regions containing the front as well as the initial batch of plasmodium put onto the very left of the agar dish. Next, we selected the largest region of interest displaying a properly formed network. While this region is easy to determine for a frame, it may happen that at some frame of the sequence P. polycephalum starts to deviate from well-behaved growth, effectively disqualifying all frames in the sequence from this point on. In summary, for each of the 90 data sets we find the longest usable sequence of frames and decide defensively on a region of interest. We store this information in small config files which can be used for subsequent automated graph extraction.</p>

    <p>Given these config files and an extraction pipeline, NEFI can be used to batch process the sequences automatically. The resulting raw graphs are then stored and ready for further processing. For a detailed discussion of the errors introduced by this procedure consult. At this point we strongly recommend to look into the possibility of applying filters if you want to use these raw graphs. Especially removing small components and contracting spurious nodes that are close to each other can increase the topological similarity between the graph and the original depicted structure.</p> 

    <p>For our purposes we remove small components, dead-end edges and smooth nodes of degree two. After applying this post-processing step we find excellent agreement between the graphs and the original images depicting networks of P. polycephalum.</p>
    
    <h2>Node Tracking</h2>

    <p>Given the post processed graphs, we have obtained the nodes and the euclidean positions in the plane. We exploit this information to compute a node tracking, that is, we assign unique identifies to nodes in the first frame and then compute the identifiers of the nodes in the remaining frames. To do so we construct a linear program which considers all possible assignments of identifiers together with their respective costs. Amongst all possible assignments we choose the one with minimal cost.</p>

    <p>Detailed information is in preparation ...</p>

  <div>

    <div class="spacer-huge"/>
  <footer class="footer">
    <div class="container">
      <a href="http://www.mpi-inf.mpg.de/departments/algorithms-complexity/"><img height="50" src=
      "/images/mpilogo-inf-wide.png" alt="mpi logo"></a>

      <div style="float:right">
        <p class="small"><a href="http://www.mpi-inf.mpg.de/imprint/">Imprint</a></p>
      </div>
    </div>
  </footer><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script> <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js">
</script>
</body>
</html>
