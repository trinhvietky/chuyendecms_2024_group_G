<?php
/* Template Name: Article Grid */
get_header(); ?>

<style>
/* CSS tùy chỉnh layout dạng lưới */
.responsive-article-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin: 20px auto;
    max-width: 1200px;
}

.responsive-article {
    width: 30%;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
}

.responsive-article:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.responsive-article img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.responsive-article h3 {
    font-size: 1.3em;
    font-weight: bold;
    color: #333;
    margin: 20px 0;
    padding: 0 10px;
}

.responsive-article p {
    font-size: 1em;
    color: #555;
    padding: 0 15px 20px;
    margin: 0;
}

.responsive-article p strong {
    color: #000;
}

/* Responsive - hiển thị 1 bài trên mỗi dòng khi màn hình nhỏ hơn 768px */
@media (max-width: 768px) {
    .responsive-article {
        width: 100%;
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .responsive-article h3 {
        font-size: 1.1em;
    }

    .responsive-article p {
        font-size: 0.9em;
    }
}

</style>

<div class="responsive-article-container">
    <?php
    // Truy vấn để lấy các bài viết mới nhất
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3
    );
    $query = new WP_Query($args);

    // Vòng lặp WordPress (The Loop)
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="responsive-article">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                <?php endif; ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile;
    else :
        echo '<p>Không tìm thấy bài viết nào.</p>';
    endif;

    // Reset Post Data
    wp_reset_postdata();
    ?>
</div>

<?php
get_footer();
?>