<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");

// Fetch news data from API
function fetchNewsFromAPI() {
    $apiUrl = 'http://localhost:8000/api/news';
    
    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'Content-Type: application/json'
    ]);
    
    // Execute cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // Check if request was successful
    if ($httpCode === 200 && $response) {
        $data = json_decode($response, true);
        return $data['data'] ?? []; // Assuming the API returns data in a 'data' field
    }
    
    return [];
}

// Get news data
$newsData = fetchNewsFromAPI();

// Separate featured news (first item) from regular news
$featuredNews = !empty($newsData) ? array_shift($newsData) : null;
$regularNews = $newsData;

// Function to format date
function formatDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('F j, Y');
}

// Function to get category from news data (you can customize this based on your API structure)
function getNewsCategory($news) {
    // You can add logic here to determine category based on your data structure
    // For now, returning a default category
    return 'News';
}
?>

<!-- Breadcrumb Section -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Latest News</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Latest News</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Hero News Section -->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="sec-line mx-auto"></div>
                <span class="sec-subtitle">Stay Updated</span>
                <h2 class="sec-title">Latest News & Updates</h2>
                <p class="mb-xl-4 pb-xl-3">Stay informed about the latest developments in asset management, reliability engineering, and industry insights from Dexterity Industrial Company.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured News Section -->
<section class="space-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if ($featuredNews): ?>
                <div class="featured-news wow fadeInUp" data-wow-delay="0.3s">
                    <div class="news-card-large">
                        <div class="news-image">
                            <img src="<?php echo htmlspecialchars($featuredNews['image_url'] ?? 'assets/img/blog/blog-1-1.jpg'); ?>" alt="<?php echo htmlspecialchars($featuredNews['title'] ?? 'Featured News'); ?>" class="w-100">
                            <div class="news-category">Featured</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> <?php echo formatDate($featuredNews['created_at'] ?? date('Y-m-d')); ?></span>
                                <span class="news-author"><i class="far fa-user"></i> Admin</span>
                            </div>
                            <h3 class="news-title"><?php echo htmlspecialchars($featuredNews['title'] ?? 'Featured News Title'); ?></h3>
                            <p class="news-excerpt"><?php echo htmlspecialchars($featuredNews['content'] ?? 'Featured news description...'); ?></p>
                            <a href="#" class="vs-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <!-- Fallback featured news if no API data -->
                <div class="featured-news wow fadeInUp" data-wow-delay="0.3s">
                    <div class="news-card-large">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-1-1.jpg" alt="Featured News" class="w-100">
                            <div class="news-category">Featured</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> December 15, 2024</span>
                                <span class="news-author"><i class="far fa-user"></i> Admin</span>
                            </div>
                            <h3 class="news-title">Dexterity Industrial Company Expands Asset Management Services</h3>
                            <p class="news-excerpt">We are excited to announce the expansion of our asset management services across the Kingdom of Saudi Arabia. This expansion includes new consultation services, training programs, and reliability engineering solutions...</p>
                            <a href="#" class="vs-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-news wow fadeInUp" data-wow-delay="0.4s">
                    <h4 class="sidebar-title">Recent News</h4>
                    <div class="recent-news-list">
                        <?php 
                        // Show recent news from API data (first 3 items)
                        $recentNews = array_slice($regularNews, 0, 3);
                        if (!empty($recentNews)):
                            foreach ($recentNews as $recent):
                        ?>
                        <div class="recent-news-item">
                            <div class="recent-news-image">
                                <img src="<?php echo htmlspecialchars($recent['image_url'] ?? 'assets/img/blog/blog-1-2.jpg'); ?>" alt="<?php echo htmlspecialchars($recent['title'] ?? 'Recent News'); ?>">
                            </div>
                            <div class="recent-news-content">
                                <h6><a href="#"><?php echo htmlspecialchars($recent['title'] ?? 'Recent News Title'); ?></a></h6>
                                <span class="news-date"><?php echo formatDate($recent['created_at'] ?? date('Y-m-d')); ?></span>
                            </div>
                        </div>
                        <?php 
                            endforeach;
                        else:
                            // Fallback recent news if no API data
                        ?>
                        <div class="recent-news-item">
                            <div class="recent-news-image">
                                <img src="assets/img/blog/blog-1-2.jpg" alt="Recent News 1">
                            </div>
                            <div class="recent-news-content">
                                <h6><a href="#">New ISO 55001 Implementation Project</a></h6>
                                <span class="news-date">Dec 10, 2024</span>
                            </div>
                        </div>
                        <div class="recent-news-item">
                            <div class="recent-news-image">
                                <img src="assets/img/blog/blog-1-3.jpg" alt="Recent News 2">
                            </div>
                            <div class="recent-news-content">
                                <h6><a href="#">Reliability Centered Maintenance Training</a></h6>
                                <span class="news-date">Dec 8, 2024</span>
                            </div>
                        </div>
                        <div class="recent-news-item">
                            <div class="recent-news-image">
                                <img src="assets/img/blog/blog-1-4.jpg" alt="Recent News 3">
                            </div>
                            <div class="recent-news-content">
                                <h6><a href="#">Asset Management Best Practices</a></h6>
                                <span class="news-date">Dec 5, 2024</span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- All News Grid Section -->
<section class="space-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title text-center mb-5">All News</h3>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($regularNews)): ?>
                <?php foreach ($regularNews as $index => $news): ?>
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="<?php echo 0.2 + ($index * 0.1); ?>s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="<?php echo htmlspecialchars($news['image_url'] ?? 'assets/img/blog/blog-2-1.jpg'); ?>" alt="<?php echo htmlspecialchars($news['title'] ?? 'News'); ?>" class="w-100">
                            <div class="news-category"><?php echo getNewsCategory($news); ?></div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> <?php echo formatDate($news['created_at'] ?? date('Y-m-d')); ?></span>
                            </div>
                            <h4 class="news-title"><?php echo htmlspecialchars($news['title'] ?? 'News Title'); ?></h4>
                            <p class="news-excerpt"><?php echo htmlspecialchars($news['content'] ?? 'News description...'); ?></p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback news items if no API data -->
                <!-- News Item 1 -->
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-2-1.jpg" alt="News 1" class="w-100">
                            <div class="news-category">Asset Management</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> December 12, 2024</span>
                            </div>
                            <h4 class="news-title">Implementing ISO 55001:2014 Standards</h4>
                            <p class="news-excerpt">Learn about the key steps and best practices for implementing ISO 55001:2014 Asset Management standards in your organization...</p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Item 2 -->
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-2-2.jpg" alt="News 2" class="w-100">
                            <div class="news-category">Training</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> December 10, 2024</span>
                            </div>
                            <h4 class="news-title">CMRP Certification Program Launch</h4>
                            <p class="news-excerpt">We are proud to announce the launch of our Certified Maintenance and Reliability Professional (CMRP) certification program...</p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Item 3 -->
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-2-3.jpg" alt="News 3" class="w-100">
                            <div class="news-category">Reliability</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> December 8, 2024</span>
                            </div>
                            <h4 class="news-title">Reliability Centered Maintenance Success Story</h4>
                            <p class="news-excerpt">Discover how our RCM implementation helped a major industrial facility improve their maintenance efficiency by 40%...</p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Item 4 -->
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-2-4.jpg" alt="News 4" class="w-100">
                            <div class="news-category">Consultation</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> December 5, 2024</span>
                            </div>
                            <h4 class="news-title">Criticality Assessment Methodology</h4>
                            <p class="news-excerpt">Our comprehensive approach to criticality assessment and ranking helps organizations prioritize their asset management efforts...</p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Item 5 -->
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-2-5.jpg" alt="News 5" class="w-100">
                            <div class="news-category">Industry Insights</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> December 3, 2024</span>
                            </div>
                            <h4 class="news-title">Future Trends in Asset Management</h4>
                            <p class="news-excerpt">Explore the emerging trends and technologies that are shaping the future of asset management and reliability engineering...</p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Item 6 -->
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="assets/img/blog/blog-2-6.jpg" alt="News 6" class="w-100">
                            <div class="news-category">Case Study</div>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> November 30, 2024</span>
                            </div>
                            <h4 class="news-title">MRO Inventory Optimization Project</h4>
                            <p class="news-excerpt">Case study: How we helped a manufacturing facility reduce their MRO inventory costs by 25% while improving availability...</p>
                            <a href="#" class="read-more">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <div class="pagination-wrapper text-center">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="space-bottom" data-bg-src="assets/img/bg/newsletter-bg-1-1.jpg">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="newsletter-style2">
                    <div class="newsletter-icon"><i class="fal fa-newspaper"></i></div>
                    <h2 class="newsletter-title h1">Subscribe to Our News</h2>
                    <p class="newsletter-text">Get the latest news and updates delivered directly to your inbox.</p>
                    <div class="form-group">
                        <input type="email" placeholder="Enter your email address...">
                        <button class="vs-btn">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for News Page -->
<style>
.news-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.news-card-large {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
}

.news-image {
    position: relative;
    overflow: hidden;
}

.news-image img {
    transition: transform 0.3s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.05);
}

.news-category {
    position: absolute;
    top: 20px;
    left: 20px;
    background: var(--vs-theme-primary);
    color: #fff;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.news-content {
    padding: 25px;
}

.news-meta {
    margin-bottom: 15px;
    font-size: 14px;
    color: #666;
}

.news-meta span {
    margin-right: 20px;
}

.news-meta i {
    margin-right: 5px;
    color: var(--vs-theme-primary);
}

.news-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.4;
    color: #1a1a1a;
}

.news-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.read-more {
    color: var(--vs-theme-primary);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: var(--vs-theme-secondary);
}

.read-more i {
    margin-left: 8px;
    transition: transform 0.3s ease;
}

.read-more:hover i {
    transform: translateX(5px);
}

.sidebar-news {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
}

.sidebar-title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 25px;
    color: #1a1a1a;
    position: relative;
}

.sidebar-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 50px;
    height: 3px;
    background: var(--vs-theme-primary);
}

.recent-news-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.recent-news-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.recent-news-image {
    width: 80px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    margin-right: 15px;
    flex-shrink: 0;
}

.recent-news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.recent-news-content h6 {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 5px;
    line-height: 1.4;
}

.recent-news-content h6 a {
    color: #1a1a1a;
    text-decoration: none;
    transition: color 0.3s ease;
}

.recent-news-content h6 a:hover {
    color: var(--vs-theme-primary);
}

.recent-news-content .news-date {
    font-size: 12px;
    color: #666;
}

.pagination-wrapper {
    margin-top: 50px;
}

.pagination .page-link {
    color: var(--vs-theme-primary);
    border: 2px solid #eee;
    margin: 0 5px;
    border-radius: 8px;
    padding: 12px 18px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: var(--vs-theme-primary);
    color: #fff;
    border-color: var(--vs-theme-primary);
}

.pagination .page-item.active .page-link {
    background: var(--vs-theme-primary);
    border-color: var(--vs-theme-primary);
    color: #fff;
}

.newsletter-style2 {
    background: rgba(255,255,255,0.95);
    padding: 50px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
}

.newsletter-style2 .newsletter-icon {
    font-size: 60px;
    color: var(--vs-theme-primary);
    margin-bottom: 20px;
}

.newsletter-style2 .newsletter-title {
    color: #1a1a1a;
    margin-bottom: 15px;
}

.newsletter-style2 .newsletter-text {
    color: #666;
    margin-bottom: 30px;
    font-size: 18px;
}

.newsletter-style2 .form-group {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
}

.newsletter-style2 .form-group input {
    flex: 1;
    border: 2px solid #eee;
    border-radius: 8px 0 0 8px;
    padding: 15px 20px;
    font-size: 16px;
    border-right: none;
}

.newsletter-style2 .form-group .vs-btn {
    border-radius: 0 8px 8px 0;
    padding: 15px 30px;
}

@media (max-width: 768px) {
    .newsletter-style2 {
        padding: 30px 20px;
    }
    
    .newsletter-style2 .form-group {
        flex-direction: column;
    }
    
    .newsletter-style2 .form-group input {
        border-radius: 8px;
        border-right: 2px solid #eee;
        margin-bottom: 15px;
    }
    
    .newsletter-style2 .form-group .vs-btn {
        border-radius: 8px;
    }
    
    .recent-news-item {
        flex-direction: column;
        text-align: center;
    }
    
    .recent-news-image {
        margin-right: 0;
        margin-bottom: 15px;
    }
}
</style>

<?php include("footer.php"); ?>
