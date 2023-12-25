<?php
$title = "Дубровских Никита Евгеньевич 221-361 лаб3"
	?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="../styles/footer.css">
	<link rel="stylesheet" href="../styles/header.css">
	<title>
		<?php echo $title; ?>
	</title>
</head>

<header>
	<nav>
		<ul>
			<li><a href="<?php
			$name = "Registers";
			$link = "index.php";
			$current_page = false;

			echo $link;

			?>" <?php if ($current_page)
				echo ' class="selected_menu"' ?>">
					<?php echo $name ?>
				</a></li>
			<li><a href="<?php
			$name = "G-keystrokes";
			$link = "g-keystrokes.php";
			$current_page = true;

			echo $link;

			?>" <?php if ($current_page)
				echo ' class="selected_menu"' ?>">
					<?php echo $name ?>
				</a></li>
			<li><a href="<?php
			$name = "Quickfix list";
			$link = "quickfix.php";
			$current_page = false;

			echo $link;

			?>" <?php if ($current_page)
				echo ' class="selected_menu"' ?>">
					<?php echo $name ?>
				</a></li>
		</ul>
		</ul>
	</nav>
</header>



<body>
	<article class="vim-article">
		<h2>Useful &ldquo;g&rdquo; Keystrokes</h2>
		<img src="<?php echo date("s") % 2 === 0 ? "../images/config.png" : "../images/config3.png" ?>" />
		<p>Let&rsquo;s begin gently with a mixed bag of keystrokes starting with <code>g</code>. There are many of
			these &ldquo;g&rdquo; commands in Vim, and we already saw some of them in the previous articles. Can you
			recall them?</p>
		<p>You can use these keystrokes in NORMAL mode:</p>
		<ul>
			<li><code>gf</code> - Edit the file located at the filepath under your cursor.<ul>
					<li>You can use <code>CTRL+W CTRL+F</code> to open the file in a new window.</li>
					<li>It can open the URL under your cursor if you have the plugin <code>netrw</code>.</li>
				</ul>
			</li>
			<li><code>gx</code> - Open the file located at the filepath under your cursor.<ul>
					<li>It will use the default application used by your OS for this filetype.</li>
					<li>It works with URLs too. It will open your favorite browser and load the website.</li>
					<li>It only works if you have the plugin <code>netrw</code>.</li>
				</ul>
			</li>
			<li><code>gi</code> - Move to the last insertion you did and switch to INSERT mode.<ul>
					<li>Pretty useful if you stopped your editing to look at some other file.</li>
					<li>It uses marks under the hood: more on that later in this article.</li>
				</ul>
			</li>
			<li><code>gv</code> - Start VISUAL mode and use the selection made during the last VISUAL mode.</li>
			<li><code>gn</code> - Select the match of your last search:<ol>
					<li>Move to the last searched match.</li>
					<li>Switch to VISUAL mode (if you weren&rsquo;t in VISUAL mode already).</li>
					<li>Select the match.</li>
					<li>You can continue to hit <code>n</code> (or <code>gn</code>) to select the area between the
						current match and the next match.</li>
				</ol>
			</li>
			<li><code>gI</code> - Insert text at the beginning of the line, no matter what the first characters are.
				<ul>
					<li>The keystroke <code>I</code> insert text <em>just before the first non-blank characters</em>
						of the line.</li>
				</ul>
			</li>
			<li><code>ga</code> - Print the <code>a</code>scii value of the character under the cursor in decimal,
				hexadecimal or octal.</li>
			<li><code>gu</code> - Lowercase using a motion (for example, <code>guiw</code>).</li>
			<li><code>gU</code> - Uppercase using a motion (for example, <code>gUiw</code>).</li>
		</ul>
		<p>To try out <code>gf</code> and <code>gx</code>, you can write for example
			<code>https://www.google.com/</code> in Vim, place your cursor on it, and hit the keystrokes.
			Don&rsquo;t forget the trailing slash in your URL.
		</p>
		<p>You&rsquo;ll soon discover an inconvenience with <code>gx</code>: when you use it on a filepath, Vim will
			hang till you close the file. That&rsquo;s why I&rsquo;ve created the following mapping you can add to
			your <code>.vimrc</code>:</p>
		<pre tabindex=0><code>nnoremap gX :silent :execute
			\ &#34;!xdg-open&#34; expand(&#39;%:p:h&#39;) . &#34;/&#34; . expand(&#34;&lt;cfile&gt;&#34;) &#34; &amp;&#34;&lt;cr&gt;
</code></pre>
		<p>It maps the keystroke <code>gX</code> to use <code>xdg-open</code> with a relative filepath under your
			cursor. It will open the file with your favorite application <em>in the background</em>. The program
			<code>xdg-open</code> will only work on Linux-based systems; for MacOS, try <code>open</code> instead.
		</p>
		<div class="notices tip">
			<div class=header><i class="la la-gittip"></i> Vim help</div>
			<div class=body>
				<ul>
					<li><code>:help reference</code></li>
					<li><code>:help g</code></li>
				</ul>
			</div>
		</div>
	</article>
</body>

<?php
include_once("footer.php");
echo $footer;
?>
</body>