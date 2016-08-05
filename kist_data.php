
<!DOCTYPE html>

<html lang="en">
<?php include('head.php'); ?>

<body>

  <div class="container">
  
    <h1>The KIST Europe data set</h1>

    <h2>Introduction</h2>

    <p>This data set was contributed by T. Mehlhorn of the <a href="http://www.kist-europe.de">KIST Europe</a> and <a href="https://people.mpi-inf.mpg.de/~mtd">M. Dirnberger</a> of the <a href="http://www.mpi-inf.mpg.de/home/">MPI for Informatics</a>. It focuses on networks formed by the slime mold <em>Physarum Polycephalum</em>.</p>

    <p>In the following we present a short description of the KIST Europe data set designed to give the interested reader a high-level understanding of the nature of the contained data. In addition, we recommend to inspect the data directly using the available <a href="data.php">browsing functionality</a>. The expert reader interested in an in-depth exposition of all materials and methods used is referred to the <a href="documents/kist_data/JoP_D_smgr.pdf">companion paper</a> of this data set.</p>

    <h2>Description</h2>

    <p>The KIST Europe data set contains raw and processed data of 81 identical experiments, carefully executed under constant laboratory conditions. Figure~\ref{fig:setup} illustrates the experimental setup. The data was produced using the following procedure:</p>

    <ul style="list-style-type:disc">
    <li>A rectangular plastic dish is prepared with a thin sheet of agar.</li>
    <li>A small amount of dried <em>P. Polycephalum</em> (HU195xHU200) sclerotia crumbs is lined up along the short edge of the dish, see Figure~\ref{fig::sequence_1}. The dish is put into a large light-proof box</li>
    <li>After approximately 14 hours the plasmodium has resuscitated and starts exploring the available space towards the far side of the dish. Typically, the apical zone needs to cover a distance of several centimeters before network formation can be observed properly, see Figure~\ref{fig::sequence_2}</li>
    <li>For the next 30 hours we take a top-view image of the growing plasmodium and the changing network every 120 seconds from a fixed position. A typical obtained image is seen in Figure~\ref{fig::sequence_3}. We stop capturing when the apical zone is about to reach the far side of the dish, which is outside of the observed area.</li>
    <li>After obtaining sequences of images showing the characteristic networks of <em>P. Polycephalum</em>, we use a software called <a href="http://nefi.mpi-inf.mpg.de">NEFI</a> to compute corresponding sequences of graph representations of the depicted structures within a predefined region of interest, see Figure~\ref{fig::sequence_4}. The graphs store precise information of the length and width of the edges as well as the coordinates of the nodes in the plane. A typical resulting unfiltered graph is seen in Figure~\ref{fig::sequence_5}</li>
    <li>Given the resulting sequence of graphs we apply filters removing artifacts and other unwanted features of the graphs. Then we proceed to compute a novel node tracking, encoding the time development of every node taking into account the changing topology of the evolving graphs.</li>
    </ul>  

    <table style="width:100%">

    <tr>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/setup.png" alt="" width="304" height="228">
    <figcaption><strong>Fig.1</strong>: Schematic description of the experimental setup.</figcaption>
    </figure>
    </td>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_1.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.2</strong>: Crumbs of <em>P. Polycephalum</em> sclerotia forming the inoculation line.</figcaption>
    </figure>
    </td>


    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_2.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.3</strong>: The plasmodium explores the dish. The apical zone advances towards the right side of the dish supported by a complex network that is continuously forming.</figcaption>
    </figure>
    </td>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_3.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.4</strong>: As the apical zone is about to escape the observation region, the coarsening of the network becomes more pronounced.</figcaption>
    </figure>
    </td>


    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_4.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.5</strong>: The apical zone has moved on, leaving behind a complex network of veins. The dashed rectangle depicts a typical region of interest relevant for subsequent image analysis and graph detection.</figcaption>
    </figure>
    </td>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_5.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.6</strong>: The network within the region of interest has been extracted by NEFI. Note that no filters have been applied. Dead ends and nodes of degree 2 are visible still, leading to small patches of nodes appearing to clump up. Such artifacts can be removed in suitable post-processing steps.</figcaption>
    </figure>
    </td>
    
    </tr>

    </table>

<!-- 
    <figure>
    <img src="/images/kist_data/setup.png" alt="" width="304" height="228">
    <figcaption><strong>Fig.1</strong>: Schematic description of the experimental setup.</figcaption>
    </figure>

    <figure>
    <img src="/images/kist_data/physarum_sequence_1.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.2</strong>: Crumbs of <em>P. Polycephalum</em> sclerotia forming the inoculation line.</figcaption>
    </figure> -->

    <!-- <figure>
    <img src="/images/kist_data/physarum_sequence_2.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.3</strong>: The plasmodium explores the dish. The apical zone advances towards the right side of the dish supported by a complex network that is continuously forming.</figcaption>
    </figure>

    <figure>
    <img src="/images/kist_data/physarum_sequence_3.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.4</strong>: As the apical zone is about to escape the observation region, the coarsening of the network becomes more pronounced.</figcaption>
    </figure> -->

   <!--  <figure>
    <img src="/images/kist_data/physarum_sequence_4.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.5</strong>: The apical zone has moved on, leaving behind a complex network of veins. The dashed rectangle depicts a typical region of interest relevant for subsequent image analysis and graph detection.</figcaption>
    </figure>

    <figure>
    <img src="/images/kist_data/physarum_sequence_5.JPG" alt="" width="304" height="228">
    <figcaption><strong>Fig.6</strong>: The network within the region of interest has been extracted by NEFI. Note that no filters have been applied. Dead ends and nodes of degree 2 are visible still, leading to small patches of nodes appearing to clump up. Such artifacts can be removed in suitable post-processing steps.</figcaption>
    </figure> -->

    <p>Repeating this experiment we obtain 81 similar sequence of images, which we consider our raw data. We stress at this point that given the inherently uncontrollable growth process of <em>P. Polycephalum</em>, the obtained sequences differ in length and nature. That is to say, in some experiments the organism behaved unfavorably, simply stopping its growth, changing direction or even escaping the container. While such sequences are part of the raw dataset, we excluded them partially or completely from the subsequent graph extraction efforts. The removal of such data reduces the number of series depicting proper network formation to 54.</p>

    <p>After obtaining the raw data, we transform the images into equivalent mathematical graphs, thus opening up a wealth of possibilities for data analysis. To this end we deploy a convenient automatic software tool called <a href="http://nefi.mpi-inf.mpg.de">NEFI</a>, which analyzes a digital image, separates the depicted slime mold network from the background and returns a graph representation of said structure. Using this tool effectively requires some moderate amount of image preprocessing. In particular, for each sequence of images it is necessary to decide on a suitable subsequence to be processed. Here we typically exclude parts of the sequence where the apical zone is still visible. For each such subsequence a suitable region of interest is defined manually. Figure~\ref{fig::sequence_4} depicts a typical choice for the region of interest to be processed by NEFI. The established unfiltered graph can be seen in Figure~\ref{fig::sequence_5}. The graph stores the position of the nodes in the plane as well as edge attributes such as edge length and widths for each edge. In addition to the output of NEFI including the unfiltered graphs, the dataset contains NEFI's input, i.e. the selected subsequences of images cropped according to their defined regions of interest.</p>

    <p>Note that some parts of the image series showing proper network formation did not yield optimal representations of the depicted networks. This is a result of images exhibiting strong color gradients rendering them too challenging for automatic network extraction. While such cases can still be handled by tuning the parameters of image processing manually on an image per image basis, we decided to discard affected series from subsequent processing efforts. As a result the number of usable graph sequences of highest quality reduced to $36$ to which we apply a set of filters removing artifacts, isolated small components and dead-end paths. Thus we obtain a total of $3134$ distinct filtered graphs faithfully reflecting the topology and edge attributes that <em>P. Polycephalum</em> displayed during the wet-lab experiments. At this point available graph analysis packages or custom written analysis code can be deployed to investigate the data in various ways. The dataset includes the filtered graphs as well as all corresponding graph drawings. The latter enable a quick visual inspection of the results of the graph extraction.</p>

    <p>Given the obtained time-ordered sequences of graphs the development of the entire graph can be investigated. However, one may also study what happens to single nodes as <em>P. Polycephalum</em> evolves. Given a graph in a time ordered sequence of graphs, let us pick any node <em>u</em>. Can we find pick a set of nodes from graphs in the sequence that are equivalent to <em>u</em>, that is, all nodes in the set are earlier or later versions of <em>u</em> with respect to time? To answer this question we compute a so-called <em>node tracking</em> which establishes the time development of all nodes in the graph. Crucially this tracking takes into account topological changes in the evolving graphs. The result of the tracking is stored as node properties of the graphs. Naturally, the program computing the tracking is include in the dataset. To the best of our knowledge, this type of data is made available for the first time through the KIST data set.</p>

    <p>Finally, in addition to the actual data, i.e. images and graphs, the KIST Europe data set contains scripts and larger programs used to process and evaluate the data. Suitable configuration files specify the used regions of interest and the parameters used with <a href="http://nefi.mpi-inf.mpg.de">NEFI</a>. Thus it becomes possible to repeat the entire data production process from the raw images to the obtained filtered graphs including the tracking of nodes.</p>

    <p>As part of the SMGR, the KIST Europe data set is well-structured and self-contained. In particular it offers sufficient documentation describing the data when navigating it on-the-fly using the <a href="data.php">browsing functionality</a>.</p>

    <h2>Suggested usage</h2>

    <p>Previously, the data contained in the KIST Europe set has been the subject of initial analysis by the authors of this data set (manuscript in preparation). When exploring time series of <em>P. Polycephalum</em> graphs, a particular focus was placed on edge properties, the structure of faces, cuts and percolation properties. In the process, additional questions regarding the nature of <em>P. Polycephalum</em> graphs naturally arose which are still open. In particular, one would like to investigate if there is a similarity between <em>P. Polycephalum</em> networks and Voronoi graphs. The latter are well-studied and it is interesting to ask if a connection between their properties and the features of <em>P. Polycephalum</em> can be established. A different approach consists of investigating whether <em>P. Polycephalum</em> graphs are geometric spanners. Spanners have properties that enable efficient communication between different parts of the graph, a feature clearly relevant and desirable for an organism such as <em>P. Polycephalum</em>. Lastly, the information provided by the computed node tracking is yet to be used for the first time. What can be learned from the presence or absence of nodes? Can one identify patterns with certain structural properties? Given the large number of graphs in the SMGR, an investigation of such questions becomes a viable option.</p>

    <p>Admittedly, most of the suggestions given so far are inspired by our own interdisciplinary research interests. However, future investigations are hardly limited to them alone. It is fair to say that any observable of relevance defined on a weighted graph can be studied using the KIST Europe set. In particular, we'd like to stress the implications for evaluating and guiding all sorts of theoretical modeling approaches based on graphs. Any model that produces a prediction that can be turned into an observable defined on a graph can immediately be tested on the KIST Europe set. This includes time dependent observables. Predictions that agree with the SMGR data increase the trust in a given model, while discrepancies between predictions and data may help suggest improvements. Thus, data contained in the KIST Europe set may be used to drive modeling efforts and help bridge the gap between theory and experiment.</p>

    <p>Finally, we like to stress that the KIST Europe constitutes a flexible basis to work with since it contains a host of useful code and instructions. In particular, potential users are not limited to working with the graphs that are presently available. They are encouraged to start from the raw images and determine their own specific data selection and graph extraction procedures tailored to their particular research agenda. They may use the tools provided by us or deploy entirely different strategies to better suit their needs.</p>

    <!-- 

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
 -->
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
