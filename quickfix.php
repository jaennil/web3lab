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
            $current_page = false;

            echo $link;

            ?>" <?php if ($current_page)
                echo ' class="selected_menu"' ?>">
                    <?php echo $name ?>
                </a></li>
            <li><a href="<?php
            $name = "Quickfix list";
            $link = "quickfix.php";
            $current_page = true;

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
        <h2>Vim&rsquo;s Quickfix And Location List</h2>
        <p>Now, let&rsquo;s talk about a very useful data structure available in Vim, the quickfix list.</p>
        <p>Don&rsquo;t confuse the quickfix list and the quickfix window: these are two different entities. The first is
            a data structure, the second can display this data structure.</p>
        <h3>Quickfix Lists</h3>
        <p>You can think of a quickfix list as a set of positions in one or multiple files.</p>
        <h4>Basics</h4>
        <p>Let&rsquo;s take an example: what happens if you run the command <code>:vimgrep hello *</code>
            ?</p>
        <ol>
            <li>It will search the pattern &ldquo;hello&rdquo; in every file of your working directory.</li>
            <li>It will populate a quickfix list with every position matching your pattern &ldquo;hello&rdquo;.</li>
            <li>It will move your cursor to the first position of the quickfix list.</li>
        </ol>
        <p>If you want to know more about vimgrep and other tools you can search with, I
            wrote an article about that</a>
            . Other commands (like <code>:make</code>
            or <code>:grep</code>
            ) also populate automatically a quickfix list.</p>
        <p>Let&rsquo;s expand the mystery around marks: these positions in the quickfix list are in fact hidden mark!
        </p>
        <p>The quickfix list is often used to display specific errors in a codebase, often spit out from a compiler or a
            linter (via the command <code>:make</code>
            for example), but not only, as we just saw. I call the entries of a quickfix list &ldquo;positions&rdquo; to
            be more general, but sometimes Vim&rsquo;s help will refer to them as &ldquo;errors&rdquo;. Don&rsquo;t be
            confused: it&rsquo;s the same idea.</p>
        <p>Among other conditions, a quickfix list entry needs to have a filename for you to be able to jump to its
            position. Otherwise, the entry doesn&rsquo;t point to anything. Difficult to move to anything.</p>
        <h4>Useful Commands</h4>
        <p>Here are the commands you can use to navigate through the current quickfix list:</p>
        <ul>
            <li><code>:cl</code>
                or <code>:clist</code>
                - Display all valid entries of the current quickfix list. You can add a range as argument (only
                numbers).</li>
            <li><code>:cc &lt;number></code>
                - Move to the <code>&lt;number></code>
                th entry of the current quickfix list.</li>
            <li><code>:cnext</code>
                or <code>:cn</code>
                - Move to the next entry of the current quickfix list.</li>
            <li><code>:cprevious</code>
                or <code>:cp</code>
                - Move to the previous entry of the current quickfix list.</li>
            <li><code>:cfirst</code>
                or <code>:cfir</code>
                - Move to the first entry of the current quickfix list.</li>
            <li><code>:clast</code>
                or <code>:clas</code>
                - Move to the last entry of the current quickfix list.</li>
        </ul>
        <p>Here are additional commands which make quickfix lists really powerful:</p>
        <ul>
            <li><code>:cdo &lt;cmd></code>
                - Execute a command <code>&lt;cmd></code>
                on each valid entry of the current quickfix list.</li>
            <li><code>:cexpr &lt;expr></code>
                or <code>:cex &lt;expr></code>
                - Create a quickfix list using the result of evaluating the Vimscript expression <code>&lt;expr></code>
                .</li>
            <li><code>:caddexpr &lt;expr></code>
                or <code>:cadde &lt;expr></code>
                - Appends the result of evaluating the Vimscript expression <code>&lt;expr></code>
                to the current quickfix list.</li>
        </ul>
        <p>If you have no clue how to use the last two commands, you can do for example:</p>
        <ul>
            <li><code>:cex []</code>
                - Empty the current quickfix list.</li>
            <li><code>:cex system("&lt;cmd>")</code>
                - Populate your quickfix list with any shell command <code>&lt;cmd></code>
                . You can try it with <code>ls</code>
                for example.</li>
        </ul>
        <h3>The Quickfix Window</h3>
        <p>What about displaying the current quickfix list in a new buffer? You can do that with the following command:
        </p>
        <ul>
            <li><code>:copen</code>
                or <code>:cope</code>
                - Open a window (with a special buffer) to show the current quickfix list.</li>
        </ul>
        <p>You can only have one quickfix window open. To move to the position of the selected entry of the quickfix
            list in the quickfix window, hit <code>ENTER</code>
            or <code>.cc</code>
            .</p>
        <h3>Location Lists</h3>
        <p>A location list is similar to a quickfix list, except that the first is local to a window and the second is
            global to your Vim instance. In other words, you can have multiple location lists available at the same time
            (one per window open), but you can only have access to one quickfix list.</p>
        <p>The commands for location lists are similar to the ones for the quickfix lists; often, you&rsquo;ll only have
            to replace the first <code>c</code>
            (qui<code>c</code>
            fix) of the command with <code>l</code>
            (<code>l</code>
            ocation).</p>
        <p>For example:</p>
        <ul>
            <li><code>:lli</code>
                or <code>:llist</code>
                - Display all valid entries of the current location list. You can add a range as argument (only
                numbers).</li>
            <li><code>:ll &lt;number></code>
                - Move to the entry <code>&lt;number></code>
                of the current location list.</li>
            <li><code>:lnext</code>
                or <code>:lne</code>
                - Move to the next entry of the current quickfix list.</li>
        </ul>
        <p>To populate your location list you can also use the commands <code>:lvimgrep</code>
            or <code>:lmake</code>
            for example.</p>
        <p>Often, Vim users will use the quickfix list for anything related to errors in their codebase, and the
            location list for search results. But it&rsquo;s up to you at the end of the day. With Vim, you&rsquo;re the
            master of your destiny.</p>
        <div>
            <div>
                Vim help</div>
            <div>
                <ul>
                    <li><code>:help quickfix</code>
                    </li>
                    <li><code>:help quickfix-window</code>
                    </li>
                    <li><code>:help location-list</code>
                    </li>
                    <li><code>:help location-list-window</code>
                    </li>
                    <li><code>:help expr</code>
                    </li>
                    <li><code>:help system()</code>
                    </li>
                </ul>
    </article>
</body>

<?php
include_once("footer.php");
echo $footer;
?>
</body>