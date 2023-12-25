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
			$current_page = true;

			echo $link;

			?>" <?php if ($current_page)
				echo ' class="selected_menu"' ?>">
					<?php echo $name ?>
				</a></li>
			<li><a href="<?php
			$name = "G-keystrokes";
			$link = "g-keystrokes.php";
			$current_page = false;

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
	</nav>
</header>

<body>
	<article class="vim-article">
		<h2>Vim&rsquo;s Registers</h2>
		<img src="<?php echo date("s") % 2 === 0 ? "../images/neovim.png" : "../images/config2.webp" ?>" />
		<p>The registers are another big dish in our Vim feast. You can think of registers as places where you can
			read
			or write some text. I like to think about them as Vim&rsquo;s clipboards.</p>
		<h3>Specifying a Register</h3>
		<p>Here&rsquo;s a command and a NORMAL mode keystroke to display and <em>specify</em> registers:</p>
		<ul>
			<li><code>:registers</code> or <code>:reg</code> - Display the content of your registers.</li>
			<li><code>"&lt;reg></code> - This keystroke <em>specifies</em> the register <code>&lt;reg></code> to be
				read
				or written.</li>
		</ul>
		<p>How do you know when the register <code>&lt;reg></code> is read or written using the keystroke
			<code>"</code>? It depends of the keystroke you use afterward. For example:
		</p>
		<ul>
			<li>To write the register <code>a</code>:<ol>
					<li>Hit <code>"a</code> in NORMAL mode to specify what register you want to write on.</li>
					<li>Yank, change, or delete some content (for example by using <code>dd</code> in NORMAL mode)
						to
						write it to <code>a</code>.</li>
				</ol>
			</li>
			<li>To read the register <code>a</code>:<ol>
					<li>Hit <code>"a</code> in NORMAL mode to specify what register you want to read.</li>
					<li>Use a put keystroke in NORMAL mode (for example <code>p</code> or <code>P</code>) to spit
						out
						the content of the register in your current buffer.</li>
				</ol>
			</li>
		</ul>
		<p>We take the example of register <code>a</code> here, but it will work for any writable register.</p>
		<h3>The Types of Registers</h3>
		<p>There are 10 different types of registers in Vim:</p>
		<ol>
			<li><strong>The unnamed register</strong> (<code>"</code>) - Contain the last deleted, changed, or
				yanked
				content, <em>even if</em> one register was specified.</li>
			<li><strong>The numbered registers</strong> (from <code>0</code> to <code>9</code>)<ul>
					<li><code>0</code> contains the content of the last yank.</li>
					<li><code>1</code> to <code>9</code> is a stack containing the content you&rsquo;ve deleted or
						changed.<ol>
							<li>Each time you delete or change some content, it will be added to the register
								<code>1</code>.
							</li>
							<li>The previous content of the register <code>1</code> will be assigned to register
								<code>2</code>, the previoius content of <code>2</code> to <code>3</code>&mldr;
							</li>
							<li>When something is added to the register <code>1</code>, the content of the register
								<code>9</code> is lost.
							</li>
						</ol>
					</li>
					<li>None of these registers are written if you&rsquo;ve specified one before with the keystroke
						<code>"</code>.
					</li>
				</ul>
			</li>
			<li><strong>The small delete register</strong> (<code>-</code>)<ul>
					<li>Contains any deleted or changed content smaller than one line.</li>
					<li>It&rsquo;s not written if you specified a register with <code>"</code>.</li>
				</ul>
			</li>
			<li><strong>The named registers</strong> (range from <code>a</code> to <code>z</code>)<ul>
					<li>Vim will never write to them if you don&rsquo;t specify them with the keystroke
						<code>"</code>.
					</li>
					<li>You can use the uppercase name of each register to append to it (instead of overwriting it).
					</li>
				</ul>
			</li>
			<li><strong>The read only registers</strong> (<code>.</code>, <code>%</code> and <code>:</code>)<ul>
					<li><code>.</code> contains the last inserted text.</li>
					<li><code>%</code> contains the name of the current file.</li>
					<li><code>:</code> contains the most recent command line executed.</li>
				</ul>
			</li>
			<li><strong>The alternate buffer register</strong> (<code>#</code>) - Contain the alternate buffer for
				the
				current window.</li>
			<li><strong>The expression register</strong> (<code>=</code>) - Store the result of an expression. More
				about this register below.</li>
			<li><strong>The selection registers</strong> (<code>+</code> and <code>*</code>)<ul>
					<li><code>+</code> is synchronized with the system clipboard.</li>
					<li><code>*</code> is synchronized with the selection clipboard (only on Unix\Linux systems).
					</li>
				</ul>
			</li>
			<li><strong>The black hole register</strong> (<code>_</code>) - Everything written in there will
				disappear
				forever.</li>
			<li><strong>The last search pattern register</strong> (<code>/</code>) - This register contains your
				last
				search.</li>
		</ol>
		<p>As you can see, even if you don&rsquo;t specify any register with the keystroke <code>"</code>, the
			content
			you delete, change, or yank will automatically overwrite one (or multiple) of them. So if you
			don&rsquo;t
			want the content you write to your registers to be silently overwritten by Vim, <em>always write in the
				named registers</em>.</p>
		<p>Using a put command without specifying any register will spit the content of the unnamed register by
			default.
			But you might have this line in your <code>vimrc</code>:</p>
		<pre><code>clipboard+=unnamedplus
</code></pre>
		<p>In that case, the content you change, delete, or yank will go directly in the unnamed register
			<em>and</em>
			the <code>+</code> register. Using put commands will directly output the <code>+</code> register too.
			Many
			find it useful (including me) to access your OS clipboard more easily, without the need to specify the
			<code>+</code> register for reading or writing it.
		</p>
		<h3>Appending a Recording</h3>
		<p>We&rsquo;ve seen in the previous article that you can
			record your keystrokes using <code>q</code>. Now that you know how to use registers, you can manipulate
			these keystrokes:</p>
		<ul>
			<li>If you made a mistake during the recording, you can spit the whole register, modify it, and save it
				back.</li>
			<li>You can append to your recording by using the uppercase variant of your register. For example:<ol>
					<li>Hit <code>qa</code> and record whatever keystrokes you want. Stop the recording by hitting
						<code>q</code> again.
					</li>
					<li>You realize that you forgot a couple of keystrokes.</li>
					<li>Execute your keystrokes to be sure you&rsquo;re at the last position of your recording.</li>
					<li>Hit <code>qA</code> to <em>append</em> to your register <code>a</code>. When you&rsquo;re
						done,
						hit <code>q</code> again.</li>
				</ol>
			</li>
		</ul>
		<p>You&rsquo;ve just gained even more flexibility for your macros.</p>
		<h3>Using Registers in INSERT and COMMAND LINE modes</h3>
		<p>The magical keystroke <code>"</code> is great for NORMAL mode, but what about spitting the content of a
			register in INSERT mode or COMMAND LINE mode? For that, you can use <code>CTRL+R &lt;reg></code> to put
			the
			content of register <code>&lt;reg></code> in your current buffer.</p>
		<p>For example, if you hit <code>CTRL+R %</code> in INSERT mode, you&rsquo;ll put the content of the
			register
			<code>%</code> in your current buffer.
		</p>
		<h3>The Insane Expression Register</h3>
		<p>If you don&rsquo;t know the expression register, I&rsquo;m about to revolution your life. I hope
			you&rsquo;re
			ready.</p>
		<p>Try this:</p>
		<ol>
			<li>Switch to INSERT mode and hit the keystroke <code>CTRL+r =</code>. You&rsquo;ll move to Vim&rsquo;s
				command-line.</li>
			<li>From there, you can type any Vimscript expression you want, like <code>system("ls")</code> we saw
				above,
				or <code>4+4</code>.</li>
			<li>Hit <code>ENTER</code> to run the expression, and you&rsquo;ll see the output of the shell command
				<code>ls</code> directly inserted in your buffer!
			</li>
		</ol>
		<p>It&rsquo;s useful to evaluate some custom functions you&rsquo;ve defined while staying in insert mode. If
			you
			use Neovim, you can use the function <code>luaeval()</code> to evaluate some Lua too.</p>
		<h3>Clearing a Register</h3>
		<p>A last little trick about registers: if you want to empty one, you can do:</p>
		<pre><code>qaq
</code></pre>
		<p>Beginning a recording also deletes everything which is in this register. So you just need to stop the
			recording by hitting <code>q</code> again to have an empty register.</p>
		<div>
			<ul>
				<?php
				$array = array(
					":help registers",
					":help clipboard",
					":help clipboard-unnamed",
					":help clipboard-unnamedplus"
				);
				foreach ($array as $key => $value) {
					echo "<li><code>" . $value . "</code></li>";
				}
				?>
			</ul>
		</div>
	</article>
</body>

<?php
include_once("footer.php");
echo $footer;
?>
</body>