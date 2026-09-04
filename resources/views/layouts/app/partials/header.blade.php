<header class="pc-header">
	<div class="header-wrapper">
		<div class="me-auto pc-mob-drp">
			<ul class="list-unstyled">
				<li class="pc-h-item header-mobile-collapse">
					<a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide"
						aria-label="Sembunyikan menu samping">
						<i class="ti ti-menu-2" aria-hidden="true"></i>
					</a>
				</li>
				<li class="pc-h-item pc-sidebar-popup">
					<a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse"
						aria-label="Buka menu samping">
						<i class="ti ti-menu-2" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</div>

		<div class="ms-auto">
			<ul class="list-unstyled">
				<li class="dropdown pc-h-item header-user-profile">
					<a
						class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0"
						data-bs-toggle="dropdown"
						href="#"
						role="button"
						aria-haspopup="true"
						aria-expanded="false">
						<img src="{{ asset('img/logo-bkpsdm.png') }}" alt="" aria-hidden="true" class="user-avtar" />
						<span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
						<i class="ti ti-chevron-down" aria-hidden="true"></i>
						<span class="visually-hidden">Menu akun</span>
					</a>
					<div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
						<div class="dropdown-header">
							<h2 class="h6 mb-1">{{ auth()->user()->name }}</h2>
							<p class="small text-muted mb-2">{{ auth()->user()->email }}</p>
							<hr />
							<a href="{{ route('dashboard.user.edit', auth()->user()->id) }}" class="dropdown-item">
								<i class="ti ti-user" aria-hidden="true"></i>
								<span>Profil saya</span>
							</a>
							@can('admin')
								<a href="{{ route('dashboard.pengaturan') }}" class="dropdown-item">
									<i class="ti ti-settings" aria-hidden="true"></i>
									<span>Pengaturan situs</span>
								</a>
							@endcan
							<form action="{{ route('logout') }}" method="post">
								@csrf
								<button type="submit" class="dropdown-item">
									<i class="ti ti-logout" aria-hidden="true"></i>
									<span>Keluar</span>
								</button>
							</form>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</header>
