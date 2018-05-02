<?php get_header(); ?>

<main id="articles-and-sidebar" class="flex-wrapper" role="main">
 <div class="article-list ">

 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry','summary' ); ?>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	
<?php get_template_part( 'nav', 'below' ); ?>

 </div>

 <?php get_sidebar(); ?>

</main>



<style>
.flex-wrapper {
display:flex;
padding:20px 10px;
margin:auto;
max-width:1240px;
}
.article-list {flex:1 1 70%;}
#sidebar {
flex:1 1 30%;
padding: 10px;
}
.summary-header { position: relative;  overflow: hidden; }
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
.summary-header:hover .featured-image {
    transform: scale(1.05);
}
.entry-meta {
    opacity: .75;
    font-size: 12px;
}
.entry-meta a {
    color: inherit;
    text-decoration: none;
}
  .entry-meta a:hover {color:#1f90db; text-decoration:underline; }

#sidebar ul {list-style:none; margin:0; padding:0px;}

.xoxo li a {
display:block;
padding:10px;
background:#1184dd;
color:white;
margin:2px;
font-size:.9em;
text-decoration:none;
line-height:1.15;
border-radius:2px;
}
.xoxo li a:hover {
background:#22a0f2;
}

.searchform > div {display:flex; flex-wrap:wrap; padding:8px 0;}
.searchform #s {flex:1 1 auto; padding:8px; }
#searchsubmit {flex:1 1 2em; padding:8px 6px; border:none; background:#0085d0; color: white;}

 
.post {
display:block;
border:solid 1px #ddd;
padding:16px;
margin:16px auto;
box-shadow: 0 2px 8px rgba(0,0,0,.2);
text-decoration:none;
color:#333;
}
.post:hover {
 }

@media (max-width:450px) {
	.flex-wrapper { flex-direction:column; }
}

</style>



<?php get_footer(); ?>