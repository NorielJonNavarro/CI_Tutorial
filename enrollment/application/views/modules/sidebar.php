<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<div class="sidebar">
		<nav>
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<li class="nav-item">
						<a href="<?= base_url()?>" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
							<p>Staff</p>
						</a>
					</li>
				</div>

				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<li class="nav-item">
						<a href="#" class="nav-link" id="students" onclick="student_dir()">
							<i class="nav-icon fas fa-user-graduate"></i>
							<p>Students</p>
						</a>
					</li>
				</div>

				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<li class="nav-item">
						<a href="#" class="nav-link" id="courses" onclick="course_dir()">
							<i class="nav-icon fas fa-book"></i>
							<p>
								Courses
							</p>
						</a>
					</li>
				</div>
			</ul>
		</nav>
	</div>
</aside>
