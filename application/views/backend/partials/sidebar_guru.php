<?php
$loggeduser = $this->ion_auth->user()->row();
$ajaran = get_ta();
$settings 	= Setting::first();
$cari_rombel = Datarombel::find_by_guru_id($loggeduser->data_guru_id);
$uri = $this->uri->segment_array();
$user = $this->ion_auth->user()->row();
?>
<aside class="main-sidebar">              
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php $img = ($user->photo!= '')  ? site_url(PROFILEPHOTOSTHUMBS.$user->photo) : site_url('assets/img/avatar3.png'); ?>
                <img src="<?php echo $img;?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Selamat Datang<br /><?php echo $user->username; ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
			<li class="header">KONTROL NAVIGASI UTAMA</li>
            <li class="treeview <?php echo (isset($activemenu) && $activemenu == 'dashboard') ?  'active' : ''; ?>">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Beranda</span>
                </a>
            </li>
			<li class="treeview <?php echo (isset($activemenu) && $activemenu == 'referensi') ?  'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Referensi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
					<li<?php echo (isset($activemenu) && $activemenu == 'referensi' && isset($uri[2]) && $uri[2] == 'siswa') ?  ' class="active"' : ''; ?>>
        		        <a href="<?php echo site_url('admin/siswa'); ?>">
                	    <i class="fa fa-hand-o-right"></i> <span>Referensi Siswa</span>
		                </a>
        		    </li>
					<li<?php echo (isset($activemenu) && $activemenu == 'referensi' && isset($uri[2]) && $uri[2] == 'guru') ?  ' class="active"' : ''; ?>>
        		        <a href="<?php echo site_url('admin/guru'); ?>">
                	    <i class="fa fa-hand-o-right"></i> <span>Referensi Guru</span>
		                </a>
        		    </li>
					<!--li<?php echo (isset($activemenu) && $activemenu == 'referensi' && 
					isset($uri[3]) && $uri[3] == 'kkm' 
					|| 
					isset($uri[3]) && $uri[3] == 'add_kkm' 
					|| 
					isset($uri[3]) && $uri[3] == 'edit_kkm'
					) ?  ' class="active"' : ''; ?>>
        		        <a href="<?php echo site_url('admin/referensi/kkm'); ?>">
                	    <i class="fa fa-hand-o-right"></i> <span>Referensi KB (KKM)</span>
		                </a>
        		    </li-->
					<li<?php echo (isset($activemenu) && $activemenu == 'referensi' && isset($uri[3]) && $uri[3] == 'kd') ?  ' class="active"' : ''; ?>>
        		        <a href="<?php echo site_url('admin/referensi/kd'); ?>">
                	    <i class="fa fa-hand-o-right"></i> <span>Referensi Kompetensi Dasar</span>
		                </a>
        		    </li>
				</ul>
			</li>
            <li class="treeview <?php echo (isset($activemenu) && $activemenu == 'perencanaan') ?  'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-check-square-o"></i> <span>Perencanaan</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
					<li<?php echo (isset($activemenu) && $activemenu == 'perencanaan' && isset($uri[3]) && $uri[3] == 'pengetahuan' || 
					isset($uri[3]) && $uri[3] == 'add_pengetahuan' || 
					isset($uri[4]) && $uri[4] == '1')  ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/perencanaan/pengetahuan'); ?>"><i class="fa fa-hand-o-right"></i> <span>Penilaian Pengetahuan</span></a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'perencanaan' && 
					isset($uri[3]) && $uri[3] == 'keterampilan'  || 
					isset($uri[3]) && $uri[3] == 'add_keterampilan' || 
					isset($uri[4]) && $uri[4] == '2') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/perencanaan/keterampilan'); ?>"><i class="fa fa-hand-o-right"></i> <span>Penilaian Keterampilan</span></a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo (isset($activemenu) && $activemenu == 'penilaian') ?  'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Penilaian</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
					<li<?php echo (isset($activemenu) && $activemenu == 'penilaian' && isset($uri[3]) && $uri[3] == 'sikap') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/asesmen/sikap'); ?>"><i class="fa fa-hand-o-right"></i> Penilaian Sikap</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'penilaian' && isset($uri[3]) && $uri[3] == 'pengetahuan') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/asesmen/pengetahuan'); ?>"><i class="fa fa-hand-o-right"></i> Penilaian Pengetahuan</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'penilaian' && isset($uri[3]) && $uri[3] == 'keterampilan') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/asesmen/keterampilan'); ?>"><i class="fa fa-hand-o-right"></i> Penilaian Keterampilan</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'penilaian' && isset($uri[3]) && $uri[3] == 'remedial') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/asesmen/remedial'); ?>"><i class="fa fa-hand-o-right"></i> Penilaian Remedial</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'penilaian' && isset($uri[3]) && $uri[3] == 'deskripsi_mapel') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/asesmen/deskripsi_mapel'); ?>"><i class="fa fa-hand-o-right"></i> Deskripsi Per Mapel</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo (isset($activemenu) && $activemenu == 'monitoring') ?  'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-eye"></i> <span>Monitoring Dan Analisis</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
					
					<li<?php echo (isset($activemenu) && $activemenu == 'monitoring' && isset($uri[3]) && $uri[3] == 'analisis') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/monitoring/analisis'); ?>"><i class="fa fa-hand-o-right"></i> Analisis Hasil Penilaian</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'monitoring' && isset($uri[3]) && $uri[3] == 'remedial') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/monitoring/remedial'); ?>"><i class="fa fa-hand-o-right"></i> Analisis Hasil Remedial</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'monitoring' && isset($uri[3]) && $uri[3] == 'kompetensi') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/monitoring/kompetensi'); ?>"><i class="fa fa-hand-o-right"></i> Pencapaian Kompetensi</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'monitoring' && isset($uri[3]) && $uri[3] == 'prestasi') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/monitoring/prestasi'); ?>"><i class="fa fa-hand-o-right"></i> <span>Prestasi Individu Siswa</span></a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo (isset($activemenu) && $activemenu == 'profil') ?  'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Profil</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
					<li<?php echo (isset($activemenu) && $activemenu == 'profil' && isset($uri[3]) && $uri[3] == 'sekolah') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/profil/sekolah'); ?>"><i class="fa fa-hand-o-right"></i> Profil Sekolah</a>
					</li>
					<li<?php echo (isset($activemenu) && $activemenu == 'profil' && isset($uri[3]) && $uri[3] == 'user') ?  ' class="active"' : ''; ?>>
						<a href="<?php echo site_url('admin/profil/user'); ?>"><i class="fa fa-hand-o-right"></i> Profil User</a>
					</li>
                </ul>
            </li>
			<li class="treeview <?php echo (isset($activemenu) && $activemenu == 'dashboard') ?  'active' : ''; ?>">
                <a href="<?php echo site_url('admin/auth/logout'); ?>">
                    <i class="fa fa-power-off"></i> <span>Keluar dari Aplikasi</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>