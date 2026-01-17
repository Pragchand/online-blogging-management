<?php 
  require("database_connection.php"); 
    $query = "SELECT * FROM user WHERE role_id !=2 ORDER BY user_id ASC LIMIT 6";
    $result = mysqli_query($connection, $query);      	
?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 border border-1">
					<h1 class="text-uppercase text-center text-light shadow" id="about_us">About Us</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row border border-1 mb-5">
				<p class="text-light">
						Creating a blog website can be an enriching experience, offering a platform to share thoughts, ideas, and expertise with a global audience. A well-designed blog can cater to various niches, such as technology, lifestyle, travel, food, fashion, or personal development, attracting readers who are passionate about these topics.

						The foundation of a successful blog website begins with a user-friendly design. A clean, intuitive layout ensures visitors can navigate easily, finding the content they're interested in without hassle. This includes a clear menu structure, search functionality, and categorized posts. The aesthetic appeal of the site, featuring a consistent color scheme, readable fonts, and high-quality images, further enhances the user experience.

						Content is the heart of any blog. Creating engaging, valuable posts that resonate with your target audience is crucial. This involves thorough research, a unique writing style, and a regular posting schedule. Original content, combined with a personal touch, can set your blog apart from others. Incorporating multimedia elements like videos, infographics, and podcasts can also enrich the content, making it more interactive and appealing.

						Search Engine Optimization (SEO) is vital for increasing the visibility of your blog. Implementing SEO best practices, such as keyword research, optimizing meta tags, and creating SEO-friendly URLs, can significantly improve your blog's search engine rankings. This drives organic traffic, ensuring that your content reaches a broader audience.

						Interactivity is another key aspect of a successful blog. Enabling comments on posts fosters a sense of community, allowing readers to engage in discussions and share their perspectives. Social media integration is also important, as it allows readers to share your content across various platforms, further expanding your reach.

						Monetization strategies can turn a blog from a hobby into a profitable venture. This can include affiliate marketing, sponsored posts, display ads, or selling digital products like e-books and courses. However, it's essential to balance monetization efforts with the overall user experience, ensuring that ads and promotions do not overwhelm the content.
					</p>
				<?php 
					if ($result->num_rows > 0)
				    {
				      while ($user = mysqli_fetch_assoc($result))
				      {
				 ?>
				<div class="col-sm-4">
					<div class="card mb-3" style="max-width: 540px;">
					  <div class="row g-0">
					    <div class="col-sm-4">
					      <img src="../Images/user_profile/<?= $user['user_image']; ?>" alt="Profile Image" class="img-fluid rounded-start" alt="Image on loading...">
					    </div>
					    <div class="col-sm-8">
					      <div class="card-body">
					        <h5 class="card-title"><?= htmlspecialchars($user['first_name'])." ".htmlspecialchars($user['last_name']); ?></h5>
					        <p class="card-text">My self Pragchand Bheel from Tharparkar I completed my graduation from Sindh Agriculture University Tandojam</p>
					        <p class="card-text"><small class="text-body-secondary"><?//= htmlspecialchars($user['created_at']); ?></small></p>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
		<?php 
				}
			}
 		?>
		</div>
	</div>