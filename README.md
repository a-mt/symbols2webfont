# SVG Symbols to Webfont

 Upload a SVG File of Symbols: 

	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	     style="position: absolute; width: 0; height: 0" id="__SVG_SPRITE_NODE__">
	<symbol viewBox="0 0 8 12" id="myicon">
	  <path fill-rule="evenodd" d="M5.982 0c-.06.01-.112.06-.123.074-.007.007-.02.014-.022.02L.04 6.613c-.025.027-.04.063-.04.105 0 .083.063.148.144.148h2.95l-1.23 4.926v.033c-.002.01-.01.02-.01.03 0 .084.063.15.144.15.045 0 .085-.02.112-.054l5.848-6.854c.027-.028.04-.064.04-.105 0-.082-.06-.147-.142-.147H4.69L6.105.223c.01-.02.01-.04.01-.064 0-.085-.004-.12-.07-.15C6.023.004 6 0 5.98 0"></path>
	</symbol></svg>

 Retrieve a SVG Webfont: 

	<?xml version="1.0" standalone="no"?>
	<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
	<svg xmlns="http://www.w3.org/2000/svg">
	   <defs>
	      <font id="SVGFont" horiz-adv-x="512">
		 <font-face units-per-em="512" ascent="448" descent="-64" x-height="240" cap-height="480"/>
		 <missing-glyph horiz-adv-x="512"/>
		 <glyph unicode="57345" glyph-name="myicon" horiz-adv-x="341" d="M255.232 448c-2.56 -0.42667 -4.77867 -2.56 -5.248 -3.15733 -0.29867 -0.29867 -0.85333 -0.59733 -0.93867 -0.85333L1.70667 165.84533c-1.06667 -1.152 -1.70667 -2.688 -1.70667 -4.48 0 -3.54133 2.688 -6.31467 6.144 -6.31467h125.86667l-52.48 -210.176v-1.408c-0.08533 -0.42667 -0.42667 -0.85333 -0.42667 -1.28 0 -3.584 2.688 -6.4 6.144 -6.4 1.92 0 3.62667 0.85333 4.77867 2.304l249.51467 292.43733c1.152 1.19467 1.70667 2.73067 1.70667 4.48 0 3.49867 -2.56 6.272 -6.05867 6.272H200.10667L260.48 438.48533c0.42667 0.85333 0.42667 1.70667 0.42667 2.73067 0 3.62667 -0.17067 5.12 -2.98667 6.4C256.98133 447.82933 256 448 255.14667 448"/>
	      </font>
	   </defs>
	</svg>

Based on [SVG-Icon-Font-Generator](https://github.com/madeyourday/SVG-Icon-Font-Generator)