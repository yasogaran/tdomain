<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about-us',
                'title' => 'About Us',
                'content' => '<h2>Who We Are</h2>
<p>We are a leading technology solutions provider with over a decade of experience in delivering innovative software solutions to businesses worldwide.</p>

<h3>Our Mission</h3>
<p>To empower businesses through cutting-edge technology solutions that drive growth and efficiency.</p>

<h3>Our Vision</h3>
<p>To be the most trusted technology partner for businesses seeking digital transformation.</p>

<h3>Our Values</h3>
<ul>
<li>Innovation - We constantly push boundaries to deliver innovative solutions</li>
<li>Excellence - We strive for excellence in everything we do</li>
<li>Integrity - We maintain the highest standards of integrity in all our actions</li>
<li>Customer Focus - Our clients success is our success</li>
</ul>',
                'meta_title' => 'About Us - Leading Technology Solutions Provider',
                'meta_description' => 'Learn about our mission, vision, and values. We are a leading technology solutions provider with over a decade of experience in delivering innovative software solutions.',
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact Us',
                'content' => '<h2>Get In Touch</h2>
<p>We would love to hear from you. Whether you have a question about our services, pricing, or anything else, our team is ready to answer all your questions.</p>

<h3>Office Address</h3>
<p>123 Tech Street<br>
Suite 456<br>
San Francisco, CA 94102<br>
United States</p>

<h3>Contact Information</h3>
<p>Email: info@techdomain.com<br>
Phone: +1 (555) 123-4567<br>
Fax: +1 (555) 123-4568</p>

<h3>Business Hours</h3>
<p>Monday - Friday: 9:00 AM - 6:00 PM<br>
Saturday: 10:00 AM - 4:00 PM<br>
Sunday: Closed</p>',
                'meta_title' => 'Contact Us - Get In Touch With Our Team',
                'meta_description' => 'Have questions? Contact our team today. We are here to answer all your questions about our services and solutions.',
            ],
            [
                'slug' => 'privacy-policy',
                'title' => 'Privacy Policy',
                'content' => '<h2>Privacy Policy</h2>
<p><strong>Last Updated:</strong> November 2025</p>

<h3>1. Information We Collect</h3>
<p>We collect information you provide directly to us, including:</p>
<ul>
<li>Name and contact information</li>
<li>Company information</li>
<li>Project requirements and specifications</li>
<li>Communication preferences</li>
</ul>

<h3>2. How We Use Your Information</h3>
<p>We use the information we collect to:</p>
<ul>
<li>Provide and improve our services</li>
<li>Respond to your requests and inquiries</li>
<li>Send you updates and marketing communications (with your consent)</li>
<li>Comply with legal obligations</li>
</ul>

<h3>3. Information Sharing</h3>
<p>We do not sell, trade, or rent your personal information to third parties. We may share information with:</p>
<ul>
<li>Service providers who assist in our operations</li>
<li>Legal authorities when required by law</li>
</ul>

<h3>4. Data Security</h3>
<p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

<h3>5. Your Rights</h3>
<p>You have the right to:</p>
<ul>
<li>Access your personal information</li>
<li>Correct inaccurate data</li>
<li>Request deletion of your data</li>
<li>Opt-out of marketing communications</li>
</ul>

<h3>6. Contact Us</h3>
<p>If you have questions about this Privacy Policy, please contact us at privacy@techdomain.com</p>',
                'meta_title' => 'Privacy Policy - How We Protect Your Data',
                'meta_description' => 'Read our privacy policy to learn how we collect, use, and protect your personal information.',
            ],
            [
                'slug' => 'terms-of-service',
                'title' => 'Terms of Service',
                'content' => '<h2>Terms of Service</h2>
<p><strong>Last Updated:</strong> November 2025</p>

<h3>1. Acceptance of Terms</h3>
<p>By accessing and using our services, you accept and agree to be bound by the terms and provision of this agreement.</p>

<h3>2. Use License</h3>
<p>Permission is granted to temporarily access our services for personal, non-commercial transitory viewing only.</p>

<h3>3. Disclaimer</h3>
<p>Our services are provided "as is" without any representations or warranties, express or implied. We do not warrant that:</p>
<ul>
<li>The services will be uninterrupted or error-free</li>
<li>Defects will be corrected</li>
<li>The services are free of viruses or harmful components</li>
</ul>

<h3>4. Limitations</h3>
<p>In no event shall we be liable for any damages arising out of the use or inability to use our services.</p>

<h3>5. Service Modifications</h3>
<p>We reserve the right to modify or discontinue services without notice. We shall not be liable to you or any third party for any modification or discontinuance.</p>

<h3>6. Governing Law</h3>
<p>These terms shall be governed by and construed in accordance with the laws of the jurisdiction in which we operate.</p>

<h3>7. Contact Information</h3>
<p>For questions about these Terms of Service, contact us at legal@techdomain.com</p>',
                'meta_title' => 'Terms of Service - Usage Terms and Conditions',
                'meta_description' => 'Read our terms of service to understand the rules and regulations governing the use of our services.',
            ],
            [
                'slug' => 'careers',
                'title' => 'Careers',
                'content' => '<h2>Join Our Team</h2>
<p>We are always looking for talented individuals who are passionate about technology and innovation.</p>

<h3>Why Work With Us?</h3>
<ul>
<li>Work on cutting-edge technology projects</li>
<li>Competitive salary and benefits package</li>
<li>Flexible work arrangements</li>
<li>Professional development opportunities</li>
<li>Collaborative and inclusive work environment</li>
</ul>

<h3>Current Openings</h3>
<p>We are currently looking for:</p>
<ul>
<li>Senior Full Stack Developer</li>
<li>DevOps Engineer</li>
<li>UI/UX Designer</li>
<li>Project Manager</li>
<li>Business Development Executive</li>
</ul>

<h3>How to Apply</h3>
<p>Send your resume and cover letter to careers@techdomain.com with the position title in the subject line.</p>

<h3>What We Look For</h3>
<ul>
<li>Strong technical skills and experience</li>
<li>Passion for learning and innovation</li>
<li>Excellent communication skills</li>
<li>Team player with collaborative mindset</li>
<li>Problem-solving abilities</li>
</ul>',
                'meta_title' => 'Careers - Join Our Growing Team',
                'meta_description' => 'Explore career opportunities at our company. We are looking for talented individuals passionate about technology and innovation.',
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }
}
