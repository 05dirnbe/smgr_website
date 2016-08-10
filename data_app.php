<?php
ini_set('open_basedir', dirname(__FILE__) . DIRECTORY_SEPARATOR);

class fs
{
    protected $base = null;

    protected function real($path)
    {
        $temp = realpath($path);
        if (!$temp) {
            throw new Exception('Path does not exist: ' . $path);
        }
        if ($this->base && strlen($this->base)) {
            if (strpos($temp, $this->base) !== 0) {
                throw new Exception('Path is not inside base (' . $this->base . '): ' . $temp);
            }
        }
        return $temp;
    }

    protected function path($id)
    {
        $id = str_replace('/', DIRECTORY_SEPARATOR, $id);
        $id = trim($id, DIRECTORY_SEPARATOR);
        $id = $this->real($this->base . DIRECTORY_SEPARATOR . $id);
        return $id;
    }

    protected function id($path)
    {
        $path = $this->real($path);
        $path = substr($path, strlen($this->base));
        $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);
        $path = trim($path, '/');
        return strlen($path) ? $path : '/';
    }

    public function __construct($base)
    {
        $this->base = $this->real($base);
        if (!$this->base) {
            throw new Exception('Base directory does not exist');
        }
    }

    public function lst($id, $with_root = false)
    {
        $dir = $this->path($id);
        $lst = @scandir($dir);
        if (!$lst) {
            throw new Exception('Could not list path: ' . $dir);
        }
        $res = array();
        foreach ($lst as $item) {
            if ($item == '.' || $item == '..' || $item === null) {
                continue;
            }
            $tmp = preg_match('([^ a-zа-я-_0-9.]+)ui', $item);
            if ($tmp === false || $tmp === 1) {
                continue;
            }
            if (is_dir($dir . DIRECTORY_SEPARATOR . $item)) {
                $res[] = array('text' => $item, 'children' => true, 'id' => $this->id($dir . DIRECTORY_SEPARATOR . $item), 'icon' => 'folder');
            } else {
                $res[] = array('text' => $item, 'children' => false, 'id' => $this->id($dir . DIRECTORY_SEPARATOR . $item), 'type' => 'file', 'icon' => 'file file-' . substr($item, strrpos($item, '.') + 1));
            }
        }
        if ($with_root && $this->id($dir) === '/') {
            $res = array(array('text' => basename($this->base), 'children' => $res, 'id' => '/', 'icon' => 'folder', 'state' => array('opened' => true, 'disabled' => true)));
        }
        return $res;
    }

    public function data($id)
    {
        if (strpos($id, ":")) {
            $id = array_map(array($this, 'id'), explode(':', $id));
            return array('type' => 'multiple', 'content' => 'Multiple selected: ' . implode(' ', $id));
        }
        $dir = $this->path($id);
        if (is_dir($dir)) {
            return array('type' => 'folder', 'content' => $id);
        }
        if (is_file($dir)) {
            $ext = strpos($dir, '.') !== FALSE ? substr($dir, strrpos($dir, '.') + 1) : '';
            $dat = array('type' => $ext, 'content' => '');
            switch ($ext) {
                case 'txt':
                case 'text':
                case 'md':
                case 'js':
                case 'json':
                case 'css':
                case 'html':
                case 'htm':
                case 'xml':
                case 'c':
                case 'cpp':
                case 'h':
                case 'sql':
                case 'log':
                case 'py':
                case 'rb':
                case 'htaccess':
                case 'php':
                    $dat['content'] = file_get_contents($dir);
                    break;
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                case 'bmp':
                    $dat['content'] = 'data:' . finfo_file(finfo_open(FILEINFO_MIME_TYPE), $dir) . ';base64,' . base64_encode(file_get_contents($dir));
                    break;
                default:
                    $dat['content'] = 'File not recognized: ' . $this->id($dir);
                    break;
            }
            return $dat;
        }
        throw new Exception('Not a valid selection: ' . $dir);
    }
}

if (isset($_GET['operation'])) {
    $fs = new fs(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'root' . DIRECTORY_SEPARATOR);
    try {
        $rslt = null;
        switch ($_GET['operation']) {
            case 'get_node':
                $node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                $rslt = $fs->lst($node, (isset($_GET['id']) && $_GET['id'] === '#'));
                break;
            case "get_content":
                $node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
                $rslt = $fs->data($node);
                break;
            default:
                throw new Exception('Unsupported operation: ' . $_GET['operation']);
                break;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($rslt);
    } catch (Exception $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
        header('Status:  500 Server Error');
        echo $e->getMessage();
    }
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Title</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.0.9/themes/default/style.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        html, body {
            background: #ebebeb;
            font-size: 10px;
            font-family: Verdana;
            margin: 0;
            padding: 0;
        }

        #container {
            min-width: 320px;
            margin: 0px auto 0 auto;
            background: white;
            border-radius: 0px;
            padding: 0px;
            overflow: hidden;
        }

        #tree {
            float: left;
            min-width: 319px;
            border-right: 1px solid silver;
            overflow: auto;
            padding: 0px 0;
        }

        #data {
            margin-left: 320px;
        }

        #data textarea {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            border: 0;
            background: white;
            display: block;
            line-height: 18px;
            resize: none;
        }

        #data, #code {
            font: normal normal normal 12px/18px 'Consolas', monospace !important;
        }

        #tree .folder {
            background: url('images/file_sprite.png') right bottom no-repeat;
        }

        #tree .file {
            background: url('./file_sprite.png') 0 0 no-repeat;
        }

        #tree .file-pdf {
            background-position: -32px 0
        }

        #tree .file-as {
            background-position: -36px 0
        }

        #tree .file-c {
            background-position: -72px -0px
        }

        #tree .file-iso {
            background-position: -108px -0px
        }

        #tree .file-htm, #tree .file-html, #tree .file-xml, #tree .file-xsl {
            background-position: -126px -0px
        }

        #tree .file-cf {
            background-position: -162px -0px
        }

        #tree .file-cpp {
            background-position: -216px -0px
        }

        #tree .file-cs {
            background-position: -236px -0px
        }

        #tree .file-sql {
            background-position: -272px -0px
        }

        #tree .file-xls, #tree .file-xlsx {
            background-position: -362px -0px
        }

        #tree .file-h {
            background-position: -488px -0px
        }

        #tree .file-crt, #tree .file-pem, #tree .file-cer {
            background-position: -452px -18px
        }

        #tree .file-php {
            background-position: -108px -18px
        }

        #tree .file-jpg, #tree .file-jpeg, #tree .file-png, #tree .file-gif, #tree .file-bmp {
            background-position: -126px -18px
        }

        #tree .file-ppt, #tree .file-pptx {
            background-position: -144px -18px
        }

        #tree .file-rb {
            background-position: -180px -18px
        }

        #tree .file-text, #tree .file-txt, #tree .file-md, #tree .file-log, #tree .file-htaccess {
            background-position: -254px -18px
        }

        #tree .file-doc, #tree .file-docx {
            background-position: -362px -18px
        }

        #tree .file-zip, #tree .file-gz, #tree .file-tar, #tree .file-rar {
            background-position: -416px -18px
        }

        #tree .file-js {
            background-position: -434px -18px
        }

        #tree .file-css {
            background-position: -144px -0px
        }

        #tree .file-fla {
            background-position: -398px -0px
        }
    </style>
</head>
<body>
<div style="padding-top:5px; padding-bottom:5px; padding-left:5px;">
    <!-- <button type="button" class="btn btn-default" id="download-btn" style="display:block; float:left; margin-right:5px;">Download</button> -->
    <input type="text" id="search_input" value="" placeholder="Search" class="input" display:block; padding:4px;
           border-radius:4px; border:1px solid silver;">
    <!--<input class="form-control search-input" placeholder="Search" name="srch-term" style="width:215px; " type="text"> -->
    <iframe id="frame1" style="display:none"></iframe>
    <a href="javascript:populateIframe('frame1','<?php echo "download.zip"; ?>')">Download Selected Files</a>
</div>

<div id="tree"></div>
<div id="data">
    <div class="content code" style="display:none;"><textarea id="code" readonly="readonly"></textarea></div>
    <div class="content folder" style="display:none;"></div>
    <div class="content image" style="display:none; position:relative;"><img src="" alt=""
                                                                             style="display:block; position:absolute; left:50%; top:50%; padding:0; max-height:90%; max-width:90%;"/>
    </div>
    <div class="content default" style="text-align:center;">Select a file from the tree.</div>
</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.0.9/jstree.min.js"></script>
<script>

    function populateIframe(id, path) {

        var paths = $('#tree').jstree(true).get_selected(false);
        //var paths = $('#tree').jstree('get_selected');

        var paths = paths.map(function (i) {
            return 'data/root/' + i;
        })


        if (paths.length < 1) {
            return;
        }
        console.log(paths);

        var os = "";
        if (navigator.appVersion.indexOf("Mac") != -1) os = "mac";

        //window.location.href = "pycgi4.cgi?paths=" + paths + "&os=" + os;

        $.post("http://newsmgr.mpi-inf.mpg.de/pycgi4.cgi", {paths:paths, os:os}, function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
	//jQuery.get("pycgi4.cgi");

	//$.ajax({
    //        url: "http://newsmgr.mpi-inf.mpg.de/pycgi4.cgi",
    //        type: "POST",
    //        data: {paths: 'paths', os: 'os'},
    //        success: function(response){
    //                $("#div").html(response);
    //            }
    //   });

        /*$.ajax({
         //url: "pycgi.cgi",
         success: function(response){
         console.log("Sucess!");
         var ifrm = document.getElementById("frame1");
         ifrm.src = "pycgi.cgi";
         }
         });*/

        /*$.ajax({
         type: 'POST',
         url: "pycgi.cgi",
         data: {files:paths}, //passing some input here
         });*/

        /*$.post(
         "pycgi.cgi",
         {files:paths, filename:filename},
         function(data, status){
         var ifrm = document.getElementById("frame1");
         ifrm.src = "pycgi.cgi?filename="+filename;
         });*/


        /*$.post(
         "test2.py",
         {files:paths, filename:filename},
         function(data, status){
         var ifrm = document.getElementById("frame1");
         ifrm.src = "download.php?filename="+filename;
         });*/

    }

    $(function () {
        $(window).resize(function () {
            var h = Math.max($(window).height() - 0, 420);
            $('#container, #data, #tree, #data .content').height(h).filter('.default').css('lineHeight', h + 'px');
        }).resize();
        var to = false;
        $('#search_input').keyup(function () {
            if (to) {
                clearTimeout(to);
            }
            to = setTimeout(function () {
                var v = $('#search_input').val();
                $('#tree').jstree(true).search(v);
            }, 250);
        });
        ;

        $('#tree')
            .jstree({
                'core': {
                    'data': {
                        'url': '?operation=get_node',
                        'data': function (node) {
                            return {'id': node.id};
                        }
                    },
                    'check_callback': function (o, n, p, i, m) {
                        if (m && m.dnd && m.pos !== 'i') {
                            return false;
                        }
                        if (o === "move_node" || o === "copy_node") {
                            if (this.get_node(n).parent === this.get_node(p).id) {
                                return false;
                            }
                        }
                        return true;
                    },
                    'force_text': true,
                    'open_parents': true,
                    'load_open': true,
                    'expand_selected_onload': true,
                    'themes': {
                        'responsive': false,
                        'variant': 'small',
                        'stripes': true
                    }
                },
                'sort': function (a, b) {
                    return this.get_type(a) === this.get_type(b) ? (this.get_text(a) > this.get_text(b) ? 1 : -1) : (this.get_type(a) >= this.get_type(b) ? 1 : -1);
                },
                'contextmenu': {
                    'items': function (node) {
                        var tmp = $.jstree.defaults.contextmenu.items();
                        delete tmp.create.action;
                        tmp.create.label = "New";
                        tmp.create.submenu = {
                            "create_folder": {
                                "separator_after": true,
                                "label": "Folder",
                                "action": function (data) {
                                    var inst = $.jstree.reference(data.reference),
                                        obj = inst.get_node(data.reference);
                                    inst.create_node(obj, {type: "default"}, "last", function (new_node) {
                                        setTimeout(function () {
                                            inst.edit(new_node);
                                        }, 0);
                                    });
                                }
                            },
                            "create_file": {
                                "label": "File",
                                "action": function (data) {
                                    var inst = $.jstree.reference(data.reference),
                                        obj = inst.get_node(data.reference);
                                    inst.create_node(obj, {type: "file"}, "last", function (new_node) {
                                        setTimeout(function () {
                                            inst.edit(new_node);
                                        }, 0);
                                    });
                                }
                            }
                        };
                        if (this.get_type(node) === "file") {
                            delete tmp.create;
                        }
                        return tmp;
                    }
                },
                'types': {
                    'default': {'icon': 'folder'},
                    'file': {'valid_children': [], 'icon': 'file'}
                },
                'unique': {
                    'duplicate': function (name, counter) {
                        return name + ' ' + counter;
                    }
                },
                'checkbox': {
                    'whole_node': false
                },
                "search": {
                    "case_insensitive": false,
                    "show_only_matches": true
                },
                'plugins': ['state', 'dnd', 'sort', 'types', 'unique', "checkbox", "search"]
            })
            .on('select_node.jstree', function (e, data) {

                data.instance.open_all(data.node);
            })
            .on('deselect_node.jstree', function (e, data) {

                data.instance.close_all(data.node);
            })
            .on('changed.jstree', function (e, data) {
                if (data && data.selected && data.selected.length) {
                    $.get('?operation=get_content&id=' + data.selected.join(':'), function (d) {
                        if (d && typeof d.type !== 'undefined') {
                            $('#data .content').hide();
                            switch (d.type) {
                                case 'text':
                                case 'txt':
                                case 'md':
                                case 'htaccess':
                                case 'log':
                                case 'sql':
                                case 'php':
                                case 'js':
                                case 'json':
                                case 'css':
                                case 'html':
                                    $('#data .code').show();
                                    $('#code').val(d.content);
                                    break;
                                case 'png':
                                case 'jpg':
                                case 'jpeg':
                                case 'bmp':
                                case 'gif':
                                    $('#data .image img').one('load', function () {
                                        $(this).css({
                                            'marginTop': '-' + $(this).height() / 2 + 'px',
                                            'marginLeft': '-' + $(this).width() / 2 + 'px'
                                        });
                                    }).attr('src', d.content);
                                    $('#data .image').show();
                                    break;
                                default:
                                    $('#data .default').html(d.content).show();
                                    break;
                            }
                        }
                    });
                }
                else {
                    $('#data .content').hide();
                    $('#data .default').html('Select a file from the tree.').show();
                }
            });
    });
</script>
</body>
</html>
