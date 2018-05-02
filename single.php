<?php get_header(); ?>

<main id="content" role="main">
  

  <div class="maxwidth">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  
 		<?php if( has_post_thumbnail() ): ?>
			<header class="post-header with-image">
				<div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);  "></div> 
				<div class="header-content">
					<h1 class="entry-title with-image"><?php the_title(); ?></h1>			
					<?php get_template_part( 'entry', 'meta' ); ?>
				</div>
			</header>
			<?php else: ?>
			<header class="post-header no-image">
				<div class="header-content">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php get_template_part( 'entry', 'meta' ); ?>
				</div>
			</header>
		<?php endif; ?>
		
		<section class="entry-content">
	 		<?php the_content(); ?>
		</section>
	  
	  
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
  </div>
	
	<footer class="footer">
		<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>
	
</main>

<style>
/*------------------------ Page & Blog Styling -----------------------------*/
.hentry {
	margin: 0;
}

.blog #content , .archive #content {box-shadow:none;}
.blog .hentry , .archive .hentry , .search-results > article {box-shadow:0 0 4px rgba(0,0,0,.25); overflow: hidden; margin: 0 auto 16px; }

.page-header , .post-header {
	position:relative;
	margin-bottom:4px;
}
.summary-header-link { color:inherit; text-decoration:none; transition: .3s cubic-bezier(.39,.58,.57,1);  }
.summary-header-link:hover {color:#0077c6;}
.featured-image {
	padding-bottom:38%;
	background-size:cover;
	background-position:center;
	background-color:#f5f5f5;
	box-shadow:inset 0 0 24px 1px rgba(0,0,0,.1);
	vertical-align:top;
	transition: .3s cubic-bezier(.39,.58,.57,1); 
}
.summary-header {position:relative; overflow:hidden;}
.summary-header:hover .featured-image {
	transform:scale(1.05);
}
.entry-title {  line-height:1.05;  }
.entry-title small { font-size: 45%; display: block; }
h2.entry-title {padding:.5rem 0;}
.with-image .entry-title {margin:0;}
.header-content {padding: 0rem 1rem .5rem;}
.with-image .header-content {
	position:absolute;
	bottom:0; left:0; right:0;
	background:rgba(0,0,0,.5);
	background: linear-gradient( rgba(0,0,0,0) , rgba(0,0,0,.5) 55% );
	color:white;
	padding: 1.25rem 1rem .5rem; margin:0;
	text-shadow:1px 1px 2px rgba(0,0,0,.5);
}

.entry-content { padding:0 1rem 0.75rem; }
.elementor-page .entry-content {padding:0;}

.entry-meta {opacity:.75; font-size:12px;}
.entry-meta a {color:inherit; text-decoration:none;}

.moretag a {background:none; color:inherit; border:solid 1px #aaa; }
.moretag a span { display:inline-block; transition:.15s cubic-bezier(.17,.84,.44,1); }
.moretag a:hover span { transform:translateX(2px); }

@media ( max-width:480px ) {
	 .with-image .header-content {position:static; color:inherit; background:none; text-shadow:none; margin:0; padding:0px; }
}
	
	/*------------------- Comments Section -----------------------*/

.comments-dropdown {display:block;}

.number-of-comments {
font-size:1.8em;
font-weight:bold;
position:relative;
border-bottom:solid 3px;
	padding-bottom:4px;
	margin-bottom:12px;
}
.comments-dropdown summary:hover { background:#ddf4ff; }

.all-comments {
margin:0; padding:0;
}

.comments ul { padding:0px; margin:8px 0;}

.comments li {
margin:1rem 0 0 0;
padding: 1rem 0 0 40px;
list-style:none;
border-top:solid 1px #aaa;
position:relative;
}
.comment-body {position:relative; }

.reply {position:absolute; top:0; right:0; }
.avatar  {position:absolute; top:0; left:-40px;}

.comment-notes {font-size:14px;}


#respond {  padding:0px 12px;}
#respond p {margin:4px 0;}

.comment-form-comment , .form-submit {margin:0;}
.comment-form input, .comment-form textarea {
border:solid 1px #bbb;
box-shadow:inset 2px 2px 6px rgba(0,0,0,.15);
font:inherit;
width:100%;
padding:8px;
}

#comment {height:4em; transition:.45s cubic-bezier(.08,.82,.17,1); }
#comment:focus {height:10em;}

.comment-form input:focus, .comment-form textarea:focus {border:solid 1px #456;}
.comment-form input.submit { background:#eee; box-shadow:0 1px 2px rgba(0,0,0,.15); margin:16px 0; }

.logged-in-as {display:none; margin:0; }
.logged-in-as a {font-size:.85em; padding:8px; border:solid 1px; border-radius:3px; text-decoration:none; line-height:1; }
</style>
 
<?php get_footer(); ?>