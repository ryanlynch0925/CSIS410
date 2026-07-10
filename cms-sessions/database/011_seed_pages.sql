INSERT INTO pages (
    page_title,
    page_slug,
    page_heading,
    page_content,
    status
)
VALUES
(
    'Home',
    'home',
    'Welcome to Grace Bridge Missions',
    'Grace Bridge Missions connects believers with opportunities to serve, pray, give, and support mission-focused ministry.',
    'published'
),
(
    'About Us',
    'about',
    'About Grace Bridge Missions',
    'Grace Bridge Missions is a fictional Christian organization created for this CMS project. The organization focuses on service, discipleship, outreach, and Christian resources.',
    'published'
),
(
    'Mission',
    'mission',
    'Our Mission',
    'Our mission is to share Christ through service, discipleship, prayer, and practical support for mission work.',
    'published'
),
(
    'Vision',
    'vision',
    'Our Vision',
    'Our vision is to encourage believers to serve faithfully and support ministry work locally and globally.',
    'published'
),
(
    'Beliefs',
    'beliefs',
    'What We Believe',
    'Grace Bridge Missions is built around a Christian worldview that values Scripture, service, prayer, discipleship, and the Great Commission.',
    'published'
),
(
    'Ministries',
    'ministries',
    'Ministry Opportunities',
    'Grace Bridge Missions supports local outreach, global missions, prayer ministry, discipleship resources, and missionary support.',
    'published'
),
(
    'Missionaries',
    'missionaries',
    'Missionary Support',
    'This page highlights missionary support opportunities and encourages visitors to pray for those serving in ministry.',
    'published'
),
(
    'Prayer',
    'prayer',
    'Prayer Requests',
    'Visitors can use this page to learn about prayer needs and support mission work through prayer.',
    'published'
),
(
    'Donate',
    'donate',
    'Support the Mission',
    'Visitors can support Grace Bridge Missions through prayer, giving, and purchasing Christian resources.',
    'published'
),
(
    'Store',
    'store',
    'Christian Resource Store',
    'The Grace Bridge Missions store offers Christian resources such as prayer journals, Scripture cards, devotion guides, and outreach materials.',
    'published'
),
(
    'Cart',
    'cart',
    'Shopping Cart',
    'Customers can review products added to their cart, update quantities, remove items, and view totals before checkout.',
    'published'
),
(
    'Checkout',
    'checkout',
    'Checkout',
    'Customers can complete their order and review subtotal, tax, and total cost before submitting checkout information.',
    'published'
),
(
    'Contact',
    'contact',
    'Contact Grace Bridge Missions',
    'Visitors can contact Grace Bridge Missions with questions about ministry, giving, prayer, and outreach opportunities.',
    'published'
),
(
    'Mission Application',
    'application',
    'Mission Application',
    'Visitors can submit interest in mission opportunities and service involvement through this application page.',
    'published'
),
(
    'Register',
    'register',
    'Create an Account',
    'New users can register for a customer account with password strength validation.',
    'published'
),
(
    'Login',
    'login',
    'Account Login',
    'Customers, publishers, and administrators can log in to access role-based areas of the CMS.',
    'published'
),
(
    'My Account',
    'account',
    'My Account',
    'Logged-in users can view their account information and access role-based features.',
    'published'
)
ON DUPLICATE KEY UPDATE
    page_title = VALUES(page_title),
    page_heading = VALUES(page_heading),
    page_content = VALUES(page_content),
    status = VALUES(status);