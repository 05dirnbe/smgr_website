
<!DOCTYPE html>

<html lang="en">
<?php include('head.php'); ?>

<body>

  <div class="container">
  
    <h1>The KIST Europe data set</h1>

    <h2>Introduction</h2>

    <p>This data set was contributed by <a href="http://www.kist-europe.de/index.php/de/organization/nano-engineering-group/105-mehlhorn-tim">T. Mehlhorn</a> of the <a href="http://www.kist-europe.de">KIST Europe</a> and <a href="https://people.mpi-inf.mpg.de/~mtd">M. Dirnberger</a> of the <a href="http://www.mpi-inf.mpg.de/home/">MPI for Informatics</a>. It focuses on networks formed by the slime mold <em>Physarum Polycephalum</em>.</p>

    <p>In the following we present a short description of the KIST Europe data set designed to give the interested reader a high-level understanding of the nature of the contained data. In addition, we recommend to inspect the data directly using the available <a href="data.php">browsing functionality</a>. The expert reader interested in an in-depth exposition of all materials and methods used is referred to the <a href="documents/kist_data/JoP_D_smgr.pdf">companion paper</a> of this data set.</p>

    <h2>Description</h2>

    <p>The KIST Europe data set contains raw and processed data of 81 identical experiments, carefully executed under constant laboratory conditions. <strong>Figure 1</strong> illustrates the experimental setup. The data was produced using the following procedure:</p>

    <ul style="list-style-type:disc">
    <li>A rectangular plastic dish is prepared with a thin sheet of agar.</li>
    <li>A small amount of dried <em>P. Polycephalum</em> (HU195xHU200) <b>sclerotia crumbs</b> is lined up along the short edge of the dish, see <strong>Figure 2</strong>. The dish is put into a large light-proof box</li>
    <li>After approximately <b>14 hours</b> the plasmodium has resuscitated and starts exploring the available space towards the far side of the dish. Typically, the apical zone needs to cover a distance of several centimeters before network formation can be observed properly, see <strong>Figure 3</strong></li>.
    <li>For the next <b>30 hours</b> we take a <b>top-view image</b> of the growing plasmodium and its changing network every <b>120 seconds</b> from a fixed position. A typical obtained image is seen in <strong>Figure 4</strong>. We stop capturing when the apical zone is about to reach the far side of the dish, which is outside of the observed area.</li>
    <li>After obtaining <b>sequences of images</b> showing the characteristic networks of <em>P. Polycephalum</em>, we use a software called <a href="http://nefi.mpi-inf.mpg.de">NEFI</a> to compute corresponding <b>sequences of graph representations</b> of the depicted structures within a predefined region of interest, see <strong>Figure 5</strong>. In addition to the topology the graphs store precise information of the <b>length and width</b> of the edges as well as the <b>coordinates</b> of the nodes in the plane. A typical resulting unfiltered graph is seen in <strong>Figure 6</strong></li>
    <li>Given the resulting sequence of graphs we apply <b>filters</b> removing artifacts and other unwanted features of the graphs. Then we proceed to compute a <b>novel node tracking</b>, encoding the time development of every node, taking into account the changing topology of the evolving graphs.</li>
    </ul>  

    <h1> </h1>
    
    <table style="width:100%">

    <tr>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/setup.png" alt="" width="400">
    <h2> </h2>
    <figcaption><strong>Fig.1</strong>: Schematic description of the experimental setup.</figcaption>
    </figure>
    </td>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_1.JPG" alt="" width="400">
    <h2> </h2>
    <figcaption><strong>Fig.2</strong>: Crumbs of <em>P. Polycephalum</em> sclerotia forming the inoculation line.</figcaption>
    </figure>
    </td>

    </tr>
    <tr>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_2.JPG" alt="" width="400">
    <h2> </h2>
    <figcaption><strong>Fig.3</strong>: The plasmodium explores the dish. The apical zone advances towards the right side of the dish supported by a complex network that is continuously forming.</figcaption>
    </figure>
    </td>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_3.JPG" alt="" width="400">
    <h2> </h2>
    <figcaption><strong>Fig.4</strong>: As the apical zone is about to escape the observation region, the coarsening of the network becomes more pronounced.</figcaption>
    </figure>
    </td>

    </tr>
    <tr>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_4.JPG" alt="" width="400">
    <h2> </h2>
    <figcaption><strong>Fig.5</strong>: The apical zone has moved on, leaving behind a complex network of veins. The dashed rectangle depicts a typical region of interest relevant for subsequent image analysis and graph detection.</figcaption>
    </figure>
    </td>

    <td align="center" valign="center">
    <figure>
    <img src="/images/kist_data/physarum_sequence_5.JPG" alt="" width="400">
    <h2> </h2>
    <figcaption><strong>Fig.6</strong>: The network within the region of interest has been extracted by NEFI. Note that no filters have been applied. Dead ends and nodes of degree 2 are visible still, leading to small patches of nodes appearing to clump up. Such artifacts can be removed in suitable post-processing steps.</figcaption>
    </figure>
    </td>

    </tr>

    </table>

    <h1> </h1>


    <p>Repeating this experiment we obtain <b>81 sequence of images</b>, which we consider our <b>raw data</b>. We stress at this point that given the inherently uncontrollable growth process of <em>P. Polycephalum</em>, the obtained sequences differ in length and nature. That is to say, in some experiments the organism behaved unfavorably, simply stopping its growth, changing direction or even escaping the container. While such sequences are part of the raw dataset, we excluded them partially or completely from the subsequent graph extraction efforts. The removal of such data reduces the number of series depicting proper network formation to <b>54</b>.</p>

    <p>After obtaining the raw data, we transform the images into <b>equivalent mathematical graphs</b>, thus opening up a wealth of possibilities for data analysis. To this end we deploy a convenient automatic software tool called <a href="http://nefi.mpi-inf.mpg.de">NEFI</a>, which analyzes a digital image, separates the depicted slime mold network from the background and returns a graph representation of said structure. Using this tool effectively requires some moderate amount of image preprocessing. In particular, for each sequence of images it is necessary to decide on a suitable <b>subsequence</b> to be processed. Here we typically exclude parts of the sequence where the apical zone is still visible. For each such subsequence a suitable <b>region of interest</b> is defined manually. <strong>Figure 5</strong> depicts a typical choice for the region of interest to be processed by NEFI. The established <b>unfiltered graph</b> can be seen in <strong>Figure 6</strong>. The graph stores the position of the nodes in the plane as well as edge attributes such as edge length and widths for each edge. In addition to the output of NEFI including the unfiltered graphs, the dataset contains NEFI's input, i.e. the selected subsequences of images cropped according to their defined regions of interest.</p>

    <p>Note that some parts of the image series showing proper network formation did not yield optimal representations of the depicted networks. This is a result of images exhibiting strong color gradients rendering them too challenging for automatic network extraction. While such cases can still be handled by tuning the parameters of image processing manually on an image per image basis, we decided to discard affected series from subsequent processing efforts. As a result the number of <b>usable graph sequences of highest quality</b> reduced to <b>36</b> to which we apply a set of filters removing artifacts, isolated small components and dead-end paths. Thus we obtain a total of <b>3134 distinct filtered graphs</b> faithfully reflecting the topology and edge attributes that <em>P. Polycephalum</em> displayed during the wet-lab experiments. At this point available graph analysis packages or custom written analysis code can be deployed to investigate the data in various ways. The dataset includes the filtered graphs as well as all corresponding graph drawings. The latter enable a <b>quick visual inspection</b> of the results of the graph extraction.</p>

    <p>Given the obtained time-ordered sequences of graphs the development of the entire graph can be investigated. However, one may also study what happens to single nodes as <em>P. Polycephalum</em> evolves. Given a graph in a time ordered sequence of graphs, let us pick any node <em>u</em>. Can we find pick a set of nodes from graphs in the sequence that are equivalent to <em>u</em>, that is, all nodes in the set are earlier or later versions of <em>u</em> with respect to time? To answer this question we compute a so-called <b>node tracking</b> which establishes the time development of all nodes in the graph. Crucially this tracking takes into account topological changes in the evolving graphs. The result of the tracking is stored as node properties of the graphs. Naturally, the program computing the tracking is include in the dataset. To the best of our knowledge, this type of data is made available for the first time through the KIST data set.</p>

    <p>Finally, in addition to the actual data, i.e. images and graphs, the KIST Europe data set contains scripts and larger programs used to process and evaluate the data. Suitable configuration files specify the used regions of interest and the parameters used with <a href="http://nefi.mpi-inf.mpg.de">NEFI</a>. Thus it becomes possible to repeat the entire data production process from the raw images to the obtained filtered graphs including the tracking of nodes.</p>

    <p>As part of the SMGR, the KIST Europe data set is <b>well-structured and self-contained</b>. In particular it offers sufficient documentation describing the data when navigating it on-the-fly using the <a href="data.php">browsing functionality</a>.</p>

    <h2>Suggested usage</h2>

    <p>Previously, the data contained in the KIST Europe set has been the subject of <b>initial analysis</b> by the authors of the set (manuscript in preparation). When exploring time series of <em>P. Polycephalum</em> graphs, a particular focus was placed on edge properties, the structure of faces, cuts and percolation properties. In the process, <b>additional questions</b> regarding the nature of <em>P. Polycephalum</em> graphs naturally arose which are still open.</p>

    <p>In particular, one would like to investigate if there is a similarity between <em>P. Polycephalum</em> networks and Voronoi graphs. The latter are well-studied and it is interesting to ask if a connection between their properties and the features of <em>P. Polycephalum</em> can be established. A different approach consists of investigating to what extend <em>P. Polycephalum</em> graphs are geometric spanners. Spanners have properties that enable efficient communication between different parts of the graph, a feature clearly relevant and desirable for an organism such as <em>P. Polycephalum</em>. Lastly, the information provided by the computed node tracking is <b>yet to be used for the first time</b>. What can be learned from the presence or absence of nodes? Can one identify patterns with certain structural properties? Given the large number of graphs in the SMGR, an investigation of such questions becomes a viable option.
    </p>

    <p>Admittedly, most of the suggestions given so far are inspired by our own interdisciplinary research interests. However, future investigations are hardly limited to them alone. It is fair to say that <b>any</b> observable of relevance defined on a weighted graph can be studied using the KIST Europe set. In particular, we'd like to stress the implications for evaluating and guiding all sorts of theoretical modeling approaches based on graphs. Any model that produces a <b>prediction</b> that can be turned into an observable defined on a graph can immediately be <b>evaluated</b> on the KIST Europe set. This includes time dependent observables. Predictions that agree with the SMGR data increase the trust in a given model, while discrepancies between predictions and data may help suggest improvements. Thus, data contained in the KIST Europe set may be used to drive modeling efforts and help bridge the gap between theory and experiment.</p>

    <p>Finally, we like to stress that the KIST Europe constitutes a <b>flexible basis</b> to work with since it contains a host of useful code and instructions. In particular, potential users are <b>not</b> limited to working with the graphs that are presently available. They are encouraged to start from the raw images and determine their own specific data selection and graph extraction procedures <b>tailored</b> to their particular research agenda. They may use the tools provided by us or deploy entirely different strategies to better suit their needs.</p>

    <h2>How to cite</h2>

    ... coming soon.

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
