<h1>PHP Markdown</h1>

<p>Version 1.0.1o - Sun 8 Jan 2012</p>

<p>by Michel Fortin
<a href="http://michelf.com/">http://michelf.com/</a></p>

<p>based on work by John Gruber<br />
<a href="http://daringfireball.net/">http://daringfireball.net/</a></p>

<h2>Introduction</h2>

<p>Markdown is a text-to-HTML conversion tool for web writers. Markdown
allows you to write using an easy-to-read, easy-to-write plain text
format, then convert it to structurally valid XHTML (or HTML).</p>

<p>"Markdown" is two things: a plain text markup syntax, and a software 
tool, written in Perl, that converts the plain text markup to HTML. 
PHP Markdown is a port to PHP of the original Markdown program by 
John Gruber.</p>

<p>PHP Markdown can work as a plug-in for WordPress and bBlog, as a 
modifier for the Smarty templating engine, or as a replacement for
Textile formatting in any software that supports Textile.</p>

<p>Full documentation of Markdown's syntax is available on John's 
Markdown page: <a href="http://daringfireball.net/projects/markdown/">http://daringfireball.net/projects/markdown/</a></p>

<h2>Installation and Requirement</h2>

<p>PHP Markdown requires PHP version 4.0.5 or later.</p>

<h3>WordPress</h3>

<p>PHP Markdown works with <a href="http://wordpress.org/">WordPress</a>, version 1.2 or later.</p>

<ol>
<li><p>To use PHP Markdown with WordPress, place the "markdown.php" file 
in the "plugins" folder. This folder is located inside 
"wp-content" at the root of your site:</p>

<pre><code>(site home)/wp-content/plugins/
</code></pre></li>
<li><p>Activate the plugin with the administrative interface of 
WordPress. In the "Plugins" section you will now find Markdown. 
To activate the plugin, click on the "Activate" button on the 
same line as Markdown. Your entries will now be formatted by 
PHP Markdown.</p></li>
<li><p>To post Markdown content, you'll first have to disable the 
"visual" editor in the User section of WordPress.</p></li>
</ol>

<p>You can configure PHP Markdown to not apply to the comments on your 
WordPress weblog. See the "Configuration" section below.</p>

<p>It is not possible at this time to apply a different set of 
filters to different entries. All your entries will be formatted by 
PHP Markdown. This is a limitation of WordPress. If your old entries 
are written in HTML (as opposed to another formatting syntax, like 
Textile), they'll probably stay fine after installing Markdown.</p>

<h3>bBlog</h3>

<p>PHP Markdown also works with <a href="http://www.bblog.com/">bBlog</a>.</p>

<p>To use PHP Markdown with bBlog, rename "markdown.php" to 
"modifier.markdown.php" and place the file in the "bBlog_plugins" 
folder. This folder is located inside the "bblog" directory of 
your site, like this:</p>

<pre><code>    (site home)/bblog/bBlog_plugins/modifier.markdown.php
</code></pre>

<p>Select "Markdown" as the "Entry Modifier" when you post a new 
entry. This setting will only apply to the entry you are editing.</p>

<h3>Replacing Textile in TextPattern</h3>

<p><a href="http://www.textpattern.com/">TextPattern</a> use <a href="http://www.textism.com/tools/textile/">Textile</a> to format your text. You can 
replace Textile by Markdown in TextPattern without having to change
any code by using the <em>Textile Compatibility Mode</em>. This may work 
with other software that expect Textile too.</p>

<ol>
<li><p>Rename the "markdown.php" file to "classTextile.php". This will
make PHP Markdown behave as if it was the actual Textile parser.</p></li>
<li><p>Replace the "classTextile.php" file TextPattern installed in your
web directory. It can be found in the "lib" directory:</p>

<pre><code>(site home)/textpattern/lib/
</code></pre></li>
</ol>

<p>Contrary to Textile, Markdown does not convert quotes to curly ones 
and does not convert multiple hyphens (<code>--</code> and <code>---</code>) into en- and 
em-dashes. If you use PHP Markdown in Textile Compatibility Mode, you 
can solve this problem by installing the "smartypants.php" file from 
<a href="http://michelf.com/projects/php-smartypants/">PHP SmartyPants</a> beside the "classTextile.php" file. The Textile 
Compatibility Mode function will use SmartyPants automatically without 
further modification.</p>

<h3>Updating Markdown in Other Programs</h3>

<p>Many web applications now ship with PHP Markdown, or have plugins to 
perform the conversion to HTML. You can update PHP Markdown in many of 
these programs by swapping the old "markdown.php" file for the new one.</p>

<p>Here is a short non-exhaustive list of some programs and where they 
hide the "markdown.php" file.</p>

<p>| Program   | Path to Markdown
| -------   | ----------------
| <a href="http://pivotlog.net/">Pivot</a> | <code>(site home)/pivot/includes/markdown/markdown.php</code></p>

<p>If you're unsure if you can do this with your application, ask the 
developer, or wait for the developer to update his application or 
plugin with the new version of PHP Markdown.</p>

<h3>In Your Own Programs</h3>

<p>You can use PHP Markdown easily in your current PHP program. Simply 
include the file and then call the Markdown function on the text you 
want to convert:</p>

<pre><code>include_once "markdown.php";
$my_html = Markdown($my_text);
</code></pre>

<p>If you wish to use PHP Markdown with another text filter function 
built to parse HTML, you should filter the text <em>after</em> the Markdown
function call. This is an example with <a href="http://michelf.com/projects/php-smartypants/">PHP SmartyPants</a>:</p>

<pre><code>$my_html = SmartyPants(Markdown($my_text));
</code></pre>

<h3>With Smarty</h3>

<p>If your program use the <a href="http://smarty.php.net/">Smarty</a> template engine, PHP Markdown 
can now be used as a modifier for your templates. Rename "markdown.php" 
to "modifier.markdown.php" and put it in your smarty plugins folder.</p>

<p>If you are using MovableType 3.1 or later, the Smarty plugin folder is 
located at <code>(MT CGI root)/php/extlib/smarty/plugins</code>. This will allow 
Markdown to work on dynamic pages.</p>

<h2>Configuration</h2>

<p>By default, PHP Markdown produces XHTML output for tags with empty 
elements. E.g.:</p>

<pre><code>&lt;br /&gt;
</code></pre>

<p>Markdown can be configured to produce HTML-style tags; e.g.:</p>

<pre><code>&lt;br&gt;
</code></pre>

<p>To do this, you  must edit the "MARKDOWN<em>EMPTY</em>ELEMENT_SUFFIX" 
definition below the "Global default settings" header at the start of 
the "markdown.php" file.</p>

<h3>WordPress-Specific Settings</h3>

<p>By default, the Markdown plugin applies to both posts and comments on 
your WordPress weblog. To deactivate one or the other, edit the 
<code>MARKDOWN_WP_POSTS</code> or <code>MARKDOWN_WP_COMMENTS</code> definitions under the 
"WordPress settings" header at the start of the "markdown.php" file.</p>

<h2>Bugs</h2>

<p>To file bug reports please send email to:
<a href="&#109;&#x61;&#105;&#x6c;&#116;&#x6f;&#58;&#x6d;&#105;&#x63;&#104;&#x65;&#108;&#x2e;&#102;&#x6f;&#114;&#x74;&#105;&#x6e;&#64;&#x6d;&#105;&#x63;&#104;&#x65;&#108;&#x66;&#46;&#x63;&#111;&#x6d;">&#x6d;&#105;&#x63;&#104;&#x65;&#108;&#x2e;&#102;&#x6f;&#114;&#x74;&#105;&#x6e;&#64;&#x6d;&#105;&#x63;&#104;&#x65;&#108;&#x66;&#46;&#x63;&#111;&#x6d;</a></p>

<p>Please include with your report: (1) the example input; (2) the output you
expected; (3) the output PHP Markdown actually produced.</p>

<h2>Version History</h2>

<p>1.0.1o (8 Jan 2012):</p>

<ul>
<li>Silenced a new warning introduced around PHP 5.3 complaining about
POSIX characters classes not being implemented. PHP Markdown does not
use POSIX character classes, but it nevertheless trigged that warning.</li>
</ul>

<p>1.0.1n (10 Oct 2009):</p>

<ul>
<li><p>Enabled reference-style shortcut links. Now you can write reference-style 
links with less brakets:</p>

<pre><code>This is [my website].

[my website]: http://example.com/
</code></pre>

<p>This was added in the 1.0.2 betas, but commented out in the 1.0.1 branch, 
waiting for the feature to be officialized. <a href="http://babelmark.bobtfish.net/?markdown=This+is+%5Bmy+website%5D.%0D%0A%09%09%0D%0A%5Bmy+website%5D%3A+http%3A%2F%2Fexample.com%2F%0D%0A&amp;src=1&amp;dest=2">But half of the other Markdown
implementations are supporting this syntax</a>, so it makes sense for 
compatibility's sake to allow it in PHP Markdown too.</p></li>
<li><p>Now accepting many valid email addresses in autolinks that were 
previously rejected, such as:</p>

<pre><code>&lt;abc+mailbox/department=shipping@example.com&gt;
&lt;!#$%&amp;'*+-/=?^_`.{|}~@example.com&gt;
&lt;"abc@def"@example.com&gt;
&lt;"Fred Bloggs"@example.com&gt;
&lt;jsmith@[192.0.2.1]&gt;
</code></pre></li>
<li><p>Now accepting spaces in URLs for inline and reference-style links. Such 
URLs need to be surrounded by angle brakets. For instance:</p>

<pre><code>[link text](&lt;http://url/with space&gt; "optional title")

[link text][ref]
[ref]: &lt;http://url/with space&gt; "optional title"
</code></pre>

<p>There is still a quirk which may prevent this from working correctly with 
relative URLs in inline-style links however.</p></li>
<li><p>Fix for adjacent list of different kind where the second list could
end as a sublist of the first when not separated by an empty line.</p></li>
<li><p>Fixed a bug where inline-style links wouldn't be recognized when the link 
definition contains a line break between the url and the title.</p></li>
<li><p>Fixed a bug where tags where the name contains an underscore aren't parsed 
correctly.</p></li>
<li><p>Fixed some corner-cases mixing underscore-ephasis and asterisk-emphasis.</p></li>
</ul>

<p>1.0.1m (21 Jun 2008):</p>

<ul>
<li><p>Lists can now have empty items.</p></li>
<li><p>Rewrote the emphasis and strong emphasis parser to fix some issues
with odly placed and overlong markers.</p></li>
</ul>

<p>1.0.1l (11 May 2008):</p>

<ul>
<li><p>Now removing the UTF-8 BOM at the start of a document, if present.</p></li>
<li><p>Now accepting capitalized URI schemes (such as HTTP:) in automatic
links, such as <code>&lt;HTTP://EXAMPLE.COM/&gt;</code>.</p></li>
<li><p>Fixed a problem where <code>&lt;hr@example.com&gt;</code> was seen as a horizontal
rule instead of an automatic link.</p></li>
<li><p>Fixed an issue where some characters in Markdown-generated HTML
attributes weren't properly escaped with entities.</p></li>
<li><p>Fix for code blocks as first element of a list item. Previously,
this didn't create any code block for item 2:</p>

<pre><code>*   Item 1 (regular paragraph)

*       Item 2 (code block)
</code></pre></li>
<li><p>A code block starting on the second line of a document wasn't seen
as a code block. This has been fixed.</p></li>
<li><p>Added programatically-settable parser properties <code>predef_urls</code> and 
<code>predef_titles</code> for predefined URLs and titles for reference-style 
links. To use this, your PHP code must call the parser this way:</p>

<pre><code>$parser = new Markdwon_Parser;
$parser-&gt;predef_urls = array('linkref' =&gt; 'http://example.com');
$html = $parser-&gt;transform($text);
</code></pre>

<p>You can then use the URL as a normal link reference:</p>

<pre><code>[my link][linkref]  
[my link][linkRef]
</code></pre>

<p>Reference names in the parser properties <em>must</em> be lowercase.
Reference names in the Markdown source may have any case.</p></li>
<li><p>Added <code>setup</code> and <code>teardown</code> methods which can be used by subclassers
as hook points to arrange the state of some parser variables before and 
after parsing.</p></li>
</ul>

<p>1.0.1k (26 Sep 2007):</p>

<ul>
<li>Fixed a problem introduced in 1.0.1i where three or more identical
uppercase letters, as well as a few other symbols, would trigger
a horizontal line.</li>
</ul>

<p>1.0.1j (4 Sep 2007):</p>

<ul>
<li><p>Fixed a problem introduced in 1.0.1i where the closing <code>code</code> and 
<code>pre</code> tags at the end of a code block were appearing in the wrong 
order.</p></li>
<li><p>Overriding configuration settings by defining constants from an 
external before markdown.php is included is now possible without 
producing a PHP warning.</p></li>
</ul>

<p>1.0.1i (31 Aug 2007):</p>

<ul>
<li><p>Fixed a problem where an escaped backslash before a code span 
would prevent the code span from being created. This should now
work as expected:</p>

<pre><code>Litteral backslash: \\`code span`
</code></pre></li>
<li><p>Overall speed improvements, especially with long documents.</p></li>
</ul>

<p>1.0.1h (3 Aug 2007):</p>

<ul>
<li><p>Added two properties (<code>no_markup</code> and <code>no_entities</code>) to the parser 
allowing HTML tags and entities to be disabled.</p></li>
<li><p>Fix for a problem introduced in 1.0.1g where posting comments in 
WordPress would trigger PHP warnings and cause some markup to be 
incorrectly filtered by the kses filter in WordPress.</p></li>
</ul>

<p>1.0.1g (3 Jul 2007):</p>

<ul>
<li><p>Fix for PHP 5 compiled without the mbstring module. Previous fix to 
calculate the length of UTF-8 strings in <code>detab</code> when <code>mb_strlen</code> is 
not available was only working with PHP 4.</p></li>
<li><p>Fixed a problem with WordPress 2.x where full-content posts in RSS feeds 
were not processed correctly by Markdown.</p></li>
<li><p>Now supports URLs containing literal parentheses for inline links 
and images, such as:</p>

<pre><code>[WIMP](http://en.wikipedia.org/wiki/WIMP_(computing))
</code></pre>

<p>Such parentheses may be arbitrarily nested, but must be
balanced. Unbalenced parentheses are allowed however when the URL 
when escaped or when the URL is enclosed in angle brakets <code>&lt;&gt;</code>.</p></li>
<li><p>Fixed a performance problem where the regular expression for strong 
emphasis introduced in version 1.0.1d could sometime be long to process, 
give slightly wrong results, and in some circumstances could remove 
entirely the content for a whole paragraph.</p></li>
<li><p>Some change in version 1.0.1d made possible the incorrect nesting of 
anchors within each other. This is now fixed.</p></li>
<li><p>Fixed a rare issue where certain MD5 hashes in the content could
be changed to their corresponding text. For instance, this:</p>

<pre><code>The MD5 value for "+" is "26b17225b626fb9238849fd60eabdf60".
</code></pre>

<p>was incorrectly changed to this in previous versions of PHP Markdown:</p>

<pre><code>&lt;p&gt;The MD5 value for "+" is "+".&lt;/p&gt;
</code></pre></li>
<li><p>Now convert escaped characters to their numeric character 
references equivalent.</p>

<p>This fix an integration issue with SmartyPants and backslash escapes. 
Since Markdown and SmartyPants have some escapable characters in common, 
it was sometime necessary to escape them twice. Previously, two 
backslashes were sometime required to prevent Markdown from "eating" the 
backslash before SmartyPants sees it:</p>

<pre><code>Here are two hyphens: \\--
</code></pre>

<p>Now, only one backslash will do:</p>

<pre><code>Here are two hyphens: \--
</code></pre></li>
</ul>

<p>1.0.1f (7 Feb 2007):</p>

<ul>
<li><p>Fixed an issue with WordPress where manually-entered excerpts, but 
not the auto-generated ones, would contain nested paragraphs.</p></li>
<li><p>Fixed an issue introduced in 1.0.1d where headers and blockquotes 
preceded too closely by a paragraph (not separated by a blank line) 
where incorrectly put inside the paragraph.</p></li>
<li><p>Fixed an issue introduced in 1.0.1d in the tokenizeHTML method where 
two consecutive code spans would be merged into one when together they 
form a valid tag in a multiline paragraph.</p></li>
<li><p>Fixed an long-prevailing issue where blank lines in code blocks would 
be doubled when the code block is in a list item.</p>

<p>This was due to the list processing functions relying on artificially 
doubled blank lines to correctly determine when list items should 
contain block-level content. The list item processing model was thus 
changed to avoid the need for double blank lines.</p></li>
<li><p>Fixed an issue with <code>&lt;% asp-style %&gt;</code> instructions used as inline 
content where the opening <code>&lt;</code> was encoded as <code>&amp;lt;</code>.</p></li>
<li><p>Fixed a parse error occuring when PHP is configured to accept 
ASP-style delimiters as boundaries for PHP scripts.</p></li>
<li><p>Fixed a bug introduced in 1.0.1d where underscores in automatic links
got swapped with emphasis tags.</p></li>
</ul>

<p>1.0.1e (28 Dec 2006)</p>

<ul>
<li><p>Added support for internationalized domain names for email addresses in 
automatic link. Improved the speed at which email addresses are converted 
to entities. Thanks to Milian Wolff for his optimisations.</p></li>
<li><p>Made deterministic the conversion to entities of email addresses in 
automatic links. This means that a given email address will always be 
encoded the same way.</p></li>
<li><p>PHP Markdown will now use its own function to calculate the length of an 
UTF-8 string in <code>detab</code> when <code>mb_strlen</code> is not available instead of 
giving a fatal error.</p></li>
</ul>

<p>1.0.1d (1 Dec 2006)</p>

<ul>
<li><p>Fixed a bug where inline images always had an empty title attribute. The 
title attribute is now present only when explicitly defined.</p></li>
<li><p>Link references definitions can now have an empty title, previously if the 
title was defined but left empty the link definition was ignored. This can 
be useful if you want an empty title attribute in images to hide the 
tooltip in Internet Explorer.</p></li>
<li><p>Made <code>detab</code> aware of UTF-8 characters. UTF-8 multi-byte sequences are now 
correctly mapped to one character instead of the number of bytes.</p></li>
<li><p>Fixed a small bug with WordPress where WordPress' default filter <code>wpautop</code>
was not properly deactivated on comment text, resulting in hard line breaks
where Markdown do not prescribes them.</p></li>
<li><p>Added a <code>TextileRestrited</code> method to the textile compatibility mode. There
is no restriction however, as Markdown does not have a restricted mode at 
this point. This should make PHP Markdown work again in the latest 
versions of TextPattern.</p></li>
<li><p>Converted PHP Markdown to a object-oriented design.</p></li>
<li><p>Changed span and block gamut methods so that they loop over a 
customizable list of methods. This makes subclassing the parser a more 
interesting option for creating syntax extensions.</p></li>
<li><p>Also added a "document" gamut loop which can be used to hook document-level 
methods (like for striping link definitions).</p></li>
<li><p>Changed all methods which were inserting HTML code so that they now return 
a hashed representation of the code. New methods <code>hashSpan</code> and <code>hashBlock</code>
are used to hash respectivly span- and block-level generated content. This 
has a couple of significant effects:</p>

<ol>
<li>It prevents invalid nesting of Markdown-generated elements which 
could occur occuring with constructs like <code>*something [link*][1]</code>.</li>
<li>It prevents problems occuring with deeply nested lists on which 
paragraphs were ill-formed.</li>
<li>It removes the need to call <code>hashHTMLBlocks</code> twice during the the 
block gamut.</li>
</ol>

<p>Hashes are turned back to HTML prior output.</p></li>
<li><p>Made the block-level HTML parser smarter using a specially-crafted regular 
expression capable of handling nested tags.</p></li>
<li><p>Solved backtick issues in tag attributes by rewriting the HTML tokenizer to 
be aware of code spans. All these lines should work correctly now:</p>

<pre><code>&lt;span attr='`ticks`'&gt;bar&lt;/span&gt;
&lt;span attr='``double ticks``'&gt;bar&lt;/span&gt;
`&lt;test a="` content of attribute `"&gt;`
</code></pre></li>
<li><p>Changed the parsing of HTML comments to match simply from <code>&lt;!--</code> to <code>--&gt;</code> 
instead using of the more complicated SGML-style rule with paired <code>--</code>.
This is how most browsers parse comments and how XML defines them too.</p></li>
<li><p><code>&lt;address&gt;</code> has been added to the list of block-level elements and is now
treated as an HTML block instead of being wrapped within paragraph tags.</p></li>
<li><p>Now only trim trailing newlines from code blocks, instead of trimming
all trailing whitespace characters.</p></li>
<li><p>Fixed bug where this:</p>

<pre><code>[text](http://m.com "title" )
</code></pre>

<p>wasn't working as expected, because the parser wasn't allowing for spaces
before the closing paren.</p></li>
<li><p>Filthy hack to support markdown='1' in div tags.</p></li>
<li><p>_DoAutoLinks() now supports the 'dict://' URL scheme.</p></li>
<li><p>PHP- and ASP-style processor instructions are now protected as
raw HTML blocks.</p>

<pre><code>&lt;? ... ?&gt;
&lt;% ... %&gt;
</code></pre></li>
<li><p>Fix for escaped backticks still triggering code spans:</p>

<pre><code>There are two raw backticks here: \` and here: \`, not a code span
</code></pre></li>
</ul>

<p>1.0.1c (9 Dec 2005)</p>

<ul>
<li>Fixed a problem occurring with PHP 5.1.1 due to a small
change to strings variable replacement behaviour in
this version.</li>
</ul>

<p>1.0.1b (6 Jun 2005)</p>

<ul>
<li><p>Fixed a bug where an inline image followed by a reference link would
give a completely wrong result.</p></li>
<li><p>Fix for escaped backticks still triggering code spans:</p>

<pre><code>There are two raw backticks here: \` and here: \`, not a code span
</code></pre></li>
<li><p>Fix for an ordered list following an unordered list, and the 
reverse. There is now a loop in _DoList that does the two 
separately.</p></li>
<li><p>Fix for nested sub-lists in list-paragraph mode. Previously we got
a spurious extra level of <code>&lt;p&gt;</code> tags for something like this:</p>

<pre><code>*   this

    *   sub

    that
</code></pre></li>
<li><p>Fixed some incorrect behaviour with emphasis. This will now work
as it should:</p>

<pre><code>*test **thing***  
**test *thing***  
***thing* test**  
***thing** test*

Name: __________  
Address: _______
</code></pre></li>
<li><p>Correct a small bug in <code>_TokenizeHTML</code> where a Doctype declaration
was not seen as HTML.</p></li>
<li><p>Major rewrite of the WordPress integration code that should 
correct many problems by preventing default WordPress filters from 
tampering with Markdown-formatted text. More details here:
<a href="http://michelf.com/weblog/2005/wordpress-text-flow-vs-markdown/">http://michelf.com/weblog/2005/wordpress-text-flow-vs-markdown/</a></p></li>
</ul>

<p>1.0.1a (15 Apr 2005)</p>

<ul>
<li><p>Fixed an issue where PHP warnings were trigged when converting
text with list items running on PHP 4.0.6. This was comming from 
the <code>rtrim</code> function which did not support the second argument 
prior version 4.1. Replaced by a regular expression.</p></li>
<li><p>Markdown now filter correctly post excerpts and comment
excerpts in WordPress.</p></li>
<li><p>Automatic links and some code sample were "corrected" by 
the balenceTag filter in WordPress meant to ensure HTML
is well formed. This new version of PHP Markdown postpone this
filter so that it runs after Markdown.</p></li>
<li><p>Blockquote syntax and some code sample were stripped by 
a new WordPress 1.5 filter meant to remove unwanted HTML 
in comments. This new version of PHP Markdown postpone this
filter so that it runs after Markdown.</p></li>
</ul>

<p>1.0.1 (16 Dec 2004):</p>

<ul>
<li><p>Changed the syntax rules for code blocks and spans. Previously,
backslash escapes for special Markdown characters were processed
everywhere other than within inline HTML tags. Now, the contents of
code blocks and spans are no longer processed for backslash escapes.
This means that code blocks and spans are now treated literally,
with no special rules to worry about regarding backslashes.</p>

<p><strong>IMPORTANT</strong>: This breaks the syntax from all previous versions of
Markdown. Code blocks and spans involving backslash characters will
now generate different output than before.</p>

<p>Implementation-wise, this change was made by moving the call to
<code>_EscapeSpecialChars()</code> from the top-level <code>Markdown()</code> function to
within <code>_RunSpanGamut()</code>.</p></li>
<li><p>Significants performance improvement in <code>_DoHeader</code>, <code>_Detab</code>
and <code>_TokenizeHTML</code>.</p></li>
<li><p>Added <code>&gt;</code>, <code>+</code>, and <code>-</code> to the list of backslash-escapable
characters. These should have been done when these characters
were added as unordered list item markers.</p></li>
<li><p>Inline links using <code>&lt;</code> and <code>&gt;</code> URL delimiters weren't working:</p>

<pre><code>like [this](&lt;http://example.com/&gt;)
</code></pre>

<p>Fixed by moving <code>_DoAutoLinks()</code> after <code>_DoAnchors()</code> in
<code>_RunSpanGamut()</code>.</p></li>
<li><p>Fixed bug where auto-links were being processed within code spans:</p>

<pre><code>like this: `&lt;http://example.com/&gt;`
</code></pre>

<p>Fixed by moving <code>_DoAutoLinks()</code> from <code>_RunBlockGamut()</code> to
<code>_RunSpanGamut()</code>.</p></li>
<li><p>Sort-of fixed a bug where lines in the middle of hard-wrapped
paragraphs, which lines look like the start of a list item,
would accidentally trigger the creation of a list. E.g. a
paragraph that looked like this:</p>

<pre><code>I recommend upgrading to version
8. Oops, now this line is treated
as a sub-list.
</code></pre>

<p>This is fixed for top-level lists, but it can still happen for
sub-lists. E.g., the following list item will not be parsed
properly:</p>

<pre><code>*   I recommend upgrading to version
    8. Oops, now this line is treated
    as a sub-list.
</code></pre>

<p>Given Markdown's list-creation rules, I'm not sure this can
be fixed.</p></li>
<li><p>Fix for horizontal rules preceded by 2 or 3 spaces or followed by
trailing spaces and tabs.</p></li>
<li><p>Standalone HTML comments are now handled; previously, they'd get
wrapped in a spurious <code>&lt;p&gt;</code> tag.</p></li>
<li><p><code>_HashHTMLBlocks()</code> now tolerates trailing spaces and tabs following
HTML comments and <code>&lt;hr/&gt;</code> tags.</p></li>
<li><p>Changed special case pattern for hashing <code>&lt;hr&gt;</code> tags in
<code>_HashHTMLBlocks()</code> so that they must occur within three spaces
of left margin. (With 4 spaces or a tab, they should be
code blocks, but weren't before this fix.)</p></li>
<li><p>Auto-linked email address can now optionally contain
a 'mailto:' protocol. I.e. these are equivalent:</p>

<pre><code>&lt;mailto:user@example.com&gt;
&lt;user@example.com&gt;
</code></pre></li>
<li><p>Fixed annoying bug where nested lists would wind up with
spurious (and invalid) <code>&lt;p&gt;</code> tags.</p></li>
<li><p>Changed <code>_StripLinkDefinitions()</code> so that link definitions must
occur within three spaces of the left margin. Thus if you indent
a link definition by four spaces or a tab, it will now be a code
block.</p></li>
<li><p>You can now write empty links:</p>

<pre><code>[like this]()
</code></pre>

<p>and they'll be turned into anchor tags with empty href attributes.
This should have worked before, but didn't.</p></li>
<li><p><code>***this***</code> and <code>___this___</code> are now turned into</p>

<pre><code>&lt;strong&gt;&lt;em&gt;this&lt;/em&gt;&lt;/strong&gt;
</code></pre>

<p>Instead of</p>

<pre><code>&lt;strong&gt;&lt;em&gt;this&lt;/strong&gt;&lt;/em&gt;
</code></pre>

<p>which isn't valid.</p></li>
<li><p>Fixed problem for links defined with urls that include parens, e.g.:</p>

<pre><code>[1]: http://sources.wikipedia.org/wiki/Middle_East_Policy_(Chomsky)
</code></pre>

<p>"Chomsky" was being erroneously treated as the URL's title.</p></li>
<li><p>Double quotes in the title of an inline link used to give strange 
results (incorrectly made entities). Fixed.</p></li>
<li><p>Tabs are now correctly changed into spaces. Previously, only 
the first tab was converted. In code blocks, the second one was too,
but was not always correctly aligned.</p></li>
<li><p>Fixed a bug where a tab character inserted after a quote on the same
line could add a slash before the quotes.</p>

<pre><code>This is "before"    [tab] and "after" a tab.
</code></pre>

<p>Previously gave this result:</p>

<pre><code>&lt;p&gt;This is \"before\"  [tab] and "after" a tab.&lt;/p&gt;
</code></pre></li>
<li><p>Removed a call to <code>htmlentities</code>. This fixes a bug where multibyte
characters present in the title of a link reference could lead to
invalid utf-8 characters. </p></li>
<li><p>Changed a regular expression in <code>_TokenizeHTML</code> that could lead to
a segmentation fault with PHP 4.3.8 on Linux.</p></li>
<li><p>Fixed some notices that could show up if PHP error reporting 
E_NOTICE flag was set.</p></li>
</ul>

<h2>Copyright and License</h2>

<p>PHP Markdown
Copyright (c) 2004-2009 Michel Fortin<br />
<a href="http://michelf.com/">http://michelf.com/</a><br />
All rights reserved.</p>

<p>Based on Markdown<br />
Copyright (c) 2003-2006 John Gruber<br />
<a href="http://daringfireball.net/">http://daringfireball.net/</a><br />
All rights reserved.</p>

<p>Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:</p>

<ul>
<li><p>Redistributions of source code must retain the above copyright notice,
this list of conditions and the following disclaimer.</p></li>
<li><p>Redistributions in binary form must reproduce the above copyright
notice, this list of conditions and the following disclaimer in the
documentation and/or other materials provided with the distribution.</p></li>
<li><p>Neither the name "Markdown" nor the names of its contributors may
be used to endorse or promote products derived from this software
without specific prior written permission.</p></li>
</ul>

<p>This software is provided by the copyright holders and contributors "as
is" and any express or implied warranties, including, but not limited
to, the implied warranties of merchantability and fitness for a
particular purpose are disclaimed. In no event shall the copyright owner
or contributors be liable for any direct, indirect, incidental, special,
exemplary, or consequential damages (including, but not limited to,
procurement of substitute goods or services; loss of use, data, or
profits; or business interruption) however caused and on any theory of
liability, whether in contract, strict liability, or tort (including
negligence or otherwise) arising in any way out of the use of this
software, even if advised of the possibility of such damage.</p>
