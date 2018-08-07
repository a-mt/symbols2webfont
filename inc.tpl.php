<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SVG Symbols to SVG Font</title>
    <style>
        h1 {
            font-size: 1.5em;
            margin: 0;
            margin-bottom: 5px;
        }
        h2 {
            margin: 0;
            font-size: 1em;
        }
        div[hidden] {
            display: none;
        }
        .about {
            background: #f5f5f5;
            border: 1px solid #ccc;
            padding: 5px;
            padding-bottom: 0;
            margin-top: 10px;
        }
        .info {
            background: none;
            border: 0;
            cursor: pointer;
            font-size: .9em;
        }
        pre {
            background: rgba(22, 22, 22, 0.05);
            padding: 5px;
            overflow: auto;
        }
        form {
            border: 1px solid #ccc;
            border-radius: 15px;
            padding: 15px;
            margin: 5px 0;
            background: url(dust_scratches.png);
        }
        fieldset {
            margin: 20px 0;
            background: white;
        }
        .file {
            margin-top: 20px;
        }
        .actions {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #f5f5f5;
        }
        .btn {
            background: royalblue;
            border: 1px solid transparent;
            border-radius: 5px;
            padding: 10px 15px;
            color: white;
            cursor: pointer;
            transition: all .3s;
        }
        .btn:hover {
            background: white;
            color: royalblue;
            border-color: royalblue;
        }
        .alert {
            border: 1px solid transparent;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            white-space: pre;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color:#ebccd1;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }
        button {
          cursor: pointer;
        }
    </style>
  </head>
  <body>

    <?php if($file) { ?>
        <div class="alert alert-success">Your download will start in a moment. If it doesn't, use this <a href="?file">direct link.</a></div>
        <script>
            window.onload = function(){
                window.location = '?file';
            }
        </script>
    <?php }

    if($error) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php }

    if($warning) { ?>
        <div class="alert alert-warning"><?= $warning ?></div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">
      <h1>Generate SVG Webfont</h1>

      <fieldset>
        <h2>From SVG File of Symbols
          <button type="button" class="info" onclick="toggleAbout()">&#9432;</button>
        </h2>
        <div class="about" hidden>
          Upload a SVG File of Symbols:
          <pre>&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; xmlns:xlink=&quot;http://www.w3.org/1999/xlink&quot;
       style=&quot;position: absolute; width: 0; height: 0&quot; id=&quot;__SVG_SPRITE_NODE__&quot;&gt;
  &lt;symbol viewBox=&quot;0 0 8 12&quot; id=&quot;myicon&quot;&gt;
    &lt;path fill-rule=&quot;evenodd&quot; d=&quot;M5.982 0c-.06.01-.112.06-.123.074-.007.007-.02.014-.022.02L.04 6.613c-.025.027-.04.063-.04.105 0 .083.063.148.144.148h2.95l-1.23 4.926v.033c-.002.01-.01.02-.01.03 0 .084.063.15.144.15.045 0 .085-.02.112-.054l5.848-6.854c.027-.028.04-.064.04-.105 0-.082-.06-.147-.142-.147H4.69L6.105.223c.01-.02.01-.04.01-.064 0-.085-.004-.12-.07-.15C6.023.004 6 0 5.98 0&quot;&gt;&lt;/path&gt;
  &lt;/symbol&gt;&lt;/svg&gt;</pre>
          Retrieve a SVG Webfont:
          <pre>&lt;?xml version=&quot;1.0&quot; standalone=&quot;no&quot;?&gt;
  &lt;!DOCTYPE svg PUBLIC &quot;-//W3C//DTD SVG 1.1//EN&quot; &quot;http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd&quot;&gt;
  &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt;
     &lt;defs&gt;
        &lt;font id=&quot;SVGFont&quot; horiz-adv-x=&quot;512&quot;&gt;
           &lt;font-face units-per-em=&quot;512&quot; ascent=&quot;448&quot; descent=&quot;-64&quot; x-height=&quot;240&quot; cap-height=&quot;480&quot;/&gt;
           &lt;missing-glyph horiz-adv-x=&quot;512&quot;/&gt;
           &lt;glyph unicode=&quot;57345&quot; glyph-name=&quot;myicon&quot; horiz-adv-x=&quot;341&quot; d=&quot;M255.232 448c-2.56 -0.42667 -4.77867 -2.56 -5.248 -3.15733 -0.29867 -0.29867 -0.85333 -0.59733 -0.93867 -0.85333L1.70667 165.84533c-1.06667 -1.152 -1.70667 -2.688 -1.70667 -4.48 0 -3.54133 2.688 -6.31467 6.144 -6.31467h125.86667l-52.48 -210.176v-1.408c-0.08533 -0.42667 -0.42667 -0.85333 -0.42667 -1.28 0 -3.584 2.688 -6.4 6.144 -6.4 1.92 0 3.62667 0.85333 4.77867 2.304l249.51467 292.43733c1.152 1.19467 1.70667 2.73067 1.70667 4.48 0 3.49867 -2.56 6.272 -6.05867 6.272H200.10667L260.48 438.48533c0.42667 0.85333 0.42667 1.70667 0.42667 2.73067 0 3.62667 -0.17067 5.12 -2.98667 6.4C256.98133 447.82933 256 448 255.14667 448&quot;/&gt;
        &lt;/font&gt;
     &lt;/defs&gt;
  &lt;/svg&gt;</pre>
        </div>
        <div class="file">
          <label for="svgfile">SVG File</label>
          <input id="svgfile" name="svg" type="file">
        </div>
      </fieldset>

      <fieldset>
        <h2>From SVG Files
          <button type="button" class="info" onclick="toggleAbout()">&#9432;</button>
        </h2>
        <div class="about" hidden>
          Upload a ZIP File containing your files:
          <pre>myfile.zip
    myicon.svg</pre>
        </div>
        <div class="file">
          <label for="zipfile">ZIP File</label>
          <input id="zipfile" name="zip" type="file">
        </div>
      </fieldset>

      <div class="actions">
          <input type="submit" class="btn">
      </div>
    </form>

    <script>
        (function(){
            var infoElements = document.getElementsByClassName("info");

            for(var i=0; i<infoElements.length; i++) {
              infoElements[i].addEventListener("click", function(){
                  var aboutElement = this.parentNode.nextElementSibling;

                  if(aboutElement.hasAttribute("hidden")) {
                      aboutElement.removeAttribute("hidden");
                  } else {
                      aboutElement.setAttribute("hidden", true);
                  }
              });
            }
        })();
    </script>
  </body>
</html>
