<!DOCTYPE html>
<!--
Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
    <meta charset="utf-8">
    <title>CKEditor Sample</title>
    <script src="../ckeditor.js"></script>
    <script src="js/sample.js"></script>
    <link rel="stylesheet" href="css/samples.css">
    <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
</head>
<body id="main">

<main>

    <div class="grid-container">
        <div class="content grid-width-100">
            <section id="sample-customize">
                <h2>Customize Your Editor</h2>
                <p>Modular build and
                    <a href="http://docs.ckeditor.com/#!/guide/dev_configuration">numerous
                        configuration options</a>
                    give you nearly endless possibilities to customize CKEditor. Replace
                    the content of your
                    <code>
                        <a href="../config.js">config.js</a>
                    </code> file with the following code
                    and refresh this page (<strong>remember to clear the browser cache</strong>)!
                </p>
                <pre class="cm-s-neo CodeMirror">
                    <code><span style="padding-right: 0.1px;"><span class="cm-variable">CKEDITOR</span>.<span
                                    class="cm-property">editorConfig</span> <span class="cm-operator">=</span> <span
                                    class="cm-keyword">function</span>( <span class="cm-def">config</span> ) {</span>
<span style="padding-right: 0.1px;"><span class="cm-tab">	</span><span class="cm-variable-2">config</span>.<span
            class="cm-property">language</span> <span class="cm-operator">=</span> <span class="cm-string">'es'</span>;</span>
<span style="padding-right: 0.1px;"><span class="cm-tab">	</span><span class="cm-variable-2">config</span>.<span
            class="cm-property">uiColor</span> <span class="cm-operator">=</span> <span
            class="cm-string">'#F7B42C'</span>;</span>
<span style="padding-right: 0.1px;"><span class="cm-tab">	</span><span class="cm-variable-2">config</span>.<span
            class="cm-property">height</span> <span class="cm-operator">=</span> <span
            class="cm-number">300</span>;</span>
<span style="padding-right: 0.1px;"><span class="cm-tab">	</span><span class="cm-variable-2">config</span>.<span
            class="cm-property">toolbarCanCollapse</span> <span class="cm-operator">=</span> <span
            class="cm-atom">true</span>;</span>
<span style="padding-right: 0.1px;">};</span>
                    </code></pre>
            </section>

            <section>
                <h2>Toolbar Configuration</h2>
                <p>If you want to reorder toolbar buttons or remove some of them, check <a
                            href="toolbarconfigurator/index.html">this handy tool</a>!</p>
            </section>

            <section>
                <h2>More Samples!</h2>
                <p>Visit the <a href="http://sdk.ckeditor.com">CKEditor SDK</a> for a huge collection of samples
                    showcasing editor features, with source code readily available to copy and use in your own
                    implementation.</p>
            </section>

            <section>
                <h2>Developer's Guide</h2>
                <p>The most important resource for all developers working with CKEditor, integrating it with their
                    websites and applications, and customizing to their needs. You can start from here:</p>
                <ul>
                    <li><a href="http://docs.ckeditor.com/#!/guide/dev_installation">Getting Started</a> &ndash;
                        Explains most crucial editor concepts and practices as well as the installation process and
                        integration with your website.
                    </li>
                    <li><a href="http://docs.ckeditor.com/#!/guide/dev_advanced_installation">Advanced Installation
                            Concepts</a> &ndash; Describes how to upgrade, install additional components (plugins,
                        skins), or create a custom build.
                    </li>
                </ul>
                <p>When you have the basics sorted out, feel free to browse some more advanced sections like:</p>
                <ul>
                    <li><a href="http://docs.ckeditor.com/#!/guide/dev_features">Functionality Overview</a> &ndash;
                        Descriptions and samples of various editor features.
                    </li>
                    <li><a href="http://docs.ckeditor.com/#!/guide/plugin_sdk_intro">Plugin SDK</a>, <a
                                href="http://docs.ckeditor.com/#!/guide/widget_sdk_intro">Widget SDK</a>, and <a
                                href="http://docs.ckeditor.com/#!/guide/skin_sdk_intro">Skin SDK</a> &ndash; Useful when
                        you want to create your own editor components.
                    </li>
                </ul>
            </section>

            <section>
                <h2>CKEditor JavaScript API</h2>
                <p>CKEditor boasts a rich <a href="http://docs.ckeditor.com/#!/api">JavaScript API</a> that you can use
                    to adjust the editor to your needs and integrate it with your website or application.</p>
            </section>
        </div>
    </div>
</main>

<script>
    initSample();
</script>

</body>
</html>
