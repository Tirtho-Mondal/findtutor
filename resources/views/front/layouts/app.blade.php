<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TutorFinder | Find Best Tutor</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />	
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">


			<style>
				.tutorfinder-logo {
					font-size: 1.3rem; /* Adjust the size as needed */
					font-weight: bold;
					background-color: #1a1a2e; /* Background color for contrast */
					color: #fff; /* Default text color */
					
					padding: 10px; /* Padding around the text */
					display: inline-block;
					border-radius: 40%; 
				}
		
				.tutorfinder-logo .tutor {
					color: #1da1f2; /* Blue color for 'Tutor' */
				}
		
				.tutorfinder-logo .finder {
					color: #fff; /* White color for 'finder' */
				}
		
				.tutorfinder-logo:hover .tutor {
					color: #0d8ecf; /* Darker blue color on hover */
				}
		
				.tutorfinder-logo:hover .finder {
					color: #ccc; /* Lighter shade for 'finder' on hover */
				}
			</style>
		
			{{-- <div class="tutorfinder-logo">
				<span class="tutor">Tutor</span><span class="finder">finder</span>
			</div> --}}



			<a class="navbar-brand" href="{{ route('home') }} "><div class="tutorfinder-logo">
				<span class="tutor">Tutor</span><span class="finder">finder</span>
			</div>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('jobs') }}">Find Tutors</a>
					</li>										
				</ul>				
				
				@if (!Auth::check())
				<a class="btn btn-outline-info me-2" href="{{ route('account.login') }}" type="submit">Login</a>			
				@else
					@if (Auth::user()->role == 'admin')
					<a class="btn btn-outline-info me-2" href="{{ route('admin.dashboard') }}" type="submit">Admin</a>				
					@endif				
					<a class="btn btn-outline-info me-2" href="{{ route('account.profile') }}" type="submit">Account</a>			
				@endif

				<a class="btn btn-info" href="{{ route('account.createJob') }}" type="submit">Post a Tution</a>
			</div>
		</div>
	</nav>
</header>

@yield('main')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="profilePicForm" name="profilePicForm" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image" name="image">
				<p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>
{{-- <style>
	footer {
    background-color: #0d1b2a;
    color: #ffffff;
    padding: 20px 0;
}

footer h4 {
    color: #ffffff;
}

footer a {
    color: #ffffff;
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline;
}

.social-icons a {
    margin-right: 10px;
    font-size: 20px;
}

.form-control {
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    padding: .375rem .75rem;
    width: 100%;
}

.btn-primary {
    background-color: #ff6f61;
    border: none;
    padding: .5rem 1rem;
    color: #ffffff;
    cursor: pointer;
    border-radius: .25rem;
}

.btn-primary:hover {
    background-color: #e55b4f;
}

.text-center {
    text-align: center;
}

</style> --}}


<style>
	body {
		font-family: Arial, sans-serif;
	}
	.footer {
		background-color: #4b215a;
		color: white;
		padding: 40px 20px;
	}
	.footer .container {
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
	}
	.footer h4 {
		margin-bottom: 10px;
		font-weight: bold;
	}
	.footer ul {
		list-style: none;
		padding: 0;
	}
	.footer ul li {
		margin-bottom: 5px;
	}
	.footer ul li a {
		color: white;
		text-decoration: none;
	}
	.footer ul li a:hover {
		text-decoration: underline;
	}
	.footer .social-icons a {
		margin-right: 15px;
		color: white;
		text-decoration: none;
	}
	.footer .social-icons a:hover {
		color: #ddd;
	}
	.footer .social-icons img {
		width: 24px;
		height: 24px;
	}
	.footer p {
		margin: 5px 0;
	}
	.footer .copyright {
		text-align: center;
		margin-top: 20px;
		border-top: 1px solid #0e94cd;
		/* #5c2a6b; */
		padding-top: 10px;
	}
</style>


<footer class="footer">
	<div class="container">
		<div>
			<img src="logo.png" alt="Tutor Finder" style="height: 50px;">
			<p></p>
		</div>
		<div>
			<h4>Help</h4>
			<ul>
				<li><a href="/about">About Us</a></li>
				<li><a href="/branches">Branch List</a></li>
				<li><a href="/privacy-policy">Privacy Policy</a></li>
				<li><a href="/terms-conditions">Terms & Conditions</a></li>
			</ul>
		</div>
		<div>
			<h4>Explore</h4>
			<ul>
				<li><a href="/programs">Programs</a></li>
				<li><a href="/teacher-registration">Teacher Registration</a></li>
				<li><a href="/teacher-registration">Get the best Tutuor</a></li>
			</ul>
		</div>
		<div>
			<h4>Get In Touch</h4>
			<p>Address: CSE, KUET</p>
			<p>Helpline: 01571421684</p>
			<p>Email: <a href="mailto:tirthomondal.2001@gmail.com">tirthomondal.2001@gmail.com</a></p>
			<div class="social-icons">
				<a href="https://facebook.com"><img src="facebook-icon.png" alt="Facebook"></a>
				<a href="https://youtube.com"><img src="youtube-icon.png" alt="YouTube"></a>
				<a href="https://instagram.com"><img src="instagram-icon.png" alt="Instagram"></a>
				<a href="https://linkedin.com"><img src="linkedin-icon.png" alt="LinkedIn"></a>
			</div>
		</div>
	</div>
	<div class="copyright">
		<p>Copyright © <a href="#">Tirtho Modnal</a>e. All rights reserved. 2024</p>
	</div>
</footer>



{{-- <footer style="background-color: #0d1b2a; color: #ffffff; padding: 10px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Programs</h4>
                <ul>
                    <li><a href="#" style="color: #ffffff;">Corporate</a></li>
                    <li><a href="#" style="color: #ffffff;">One to One</a></li>
                    <li><a href="#" style="color: #ffffff;">Consulting</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Service</h4>
                <ul>
                    <li><a href="#" style="color: #ffffff;">Training</a></li>
                    <li><a href="#" style="color: #ffffff;">Coaching</a></li>
                    <li><a href="#" style="color: #ffffff;">Consulting</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#" style="color: #ffffff;">Home</a></li>
                    <li><a href="#" style="color: #ffffff;">About</a></li>
                    <li><a href="#" style="color: #ffffff;">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Connect</h4>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-whatsapp" style="color: #ffffff;"></i></a>
                    <a href="#"><i class="fab fa-youtube" style="color: #ffffff;"></i></a>
                    <a href="#"><i class="fab fa-instagram" style="color: #ffffff;"></i></a>
                    <a href="#"><i class="fab fa-facebook" style="color: #ffffff;"></i></a>
                    <a href="#"><i class="fab fa-linkedin" style="color: #ffffff;"></i></a>
                    <a href="#"><i class="fab fa-twitter" style="color: #ffffff;"></i></a>
                </div>
                <p style="margin-top: 10px;">Mobile: +917892474250</p>
                <p>Email: <a href="mailto:santhosh@crosscultureconnects.com" style="color: #ffffff;">santhosh@crosscultureconnects.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>&copy;<a href="#">Tirtho Modnal</a></p>
            </div>
        </div>
    </div>
</footer> --}}
<!-- resources/views/partials/footer.blade.php -->
{{-- <footer class="bg-purple-900 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex justify-between">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Udvash Logo" class="h-12">
                <p class="mt-2">পরিবর্তনের প্রজ্ঞানে নিখুঁত প্রত্যয়...</p>
            </div>
            <div>
                <h4 class="font-bold mb-2">Help</h4>
                <ul>
                    <li><a href="{{ url('/about') }}" class="hover:underline">About Us</a></li>
                    <li><a href="{{ url('/branches') }}" class="hover:underline">Branch List</a></li>
                    <li><a href="{{ url('/privacy-policy') }}" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms-conditions') }}" class="hover:underline">Terms & Conditions</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-2">Explore</h4>
                <ul>
                    <li><a href="{{ url('/programs') }}" class="hover:underline">Programs</a></li>
                    <li><a href="{{ url('/teacher-registration') }}" class="hover:underline">Teacher Registration</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-2">Get In Touch</h4>
                <p>Address: Malek Tower (5th Floor), Opposite to Farmgate Police Box, Farmgate, Dhaka-1215.</p>
                <p>Helpline: 09666775566</p>
                <p>Email: <a href="mailto:info@udvash-unmesh.com" class="hover:underline">info@udvash-unmesh.com</a></p>
                <div class="flex mt-2">
                    <a href="https://facebook.com" class="mr-4 hover:text-gray-300">
                        <img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook" class="h-6">
                    </a>
                    <a href="https://youtube.com" class="mr-4 hover:text-gray-300">
                        <img src="{{ asset('images/youtube-icon.png') }}" alt="YouTube" class="h-6">
                    </a>
                    <a href="https://instagram.com" class="mr-4 hover:text-gray-300">
                        <img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram" class="h-6">
                    </a>
                    <a href="https://linkedin.com" class="hover:text-gray-300">
                        <img src="{{ asset('images/linkedin-icon.png') }}" alt="LinkedIn" class="h-6">
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-4 text-center">
            <p>Copyright © Udvash Academic & Admission Care. All rights reserved. 2024</p>
        </div>
    </div>
</footer> --}}


{{-- <footer class="bg-dark py-3 bg-2">
<div class="container">
    <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
</div>
</footer>  --}}
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
	$('.textarea').trumbowyg();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#profilePicForm").submit(function(e){
		e.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: '{{ route("account.updateProfilePic") }}',
			type: 'post',
			data: formData,
			dataType: 'json',
			contentType: false,
			processData: false,
			success: function(response) {
				if(response.status == false) {
					var errors = response.errors;
					if (errors.image) {
						$("#image-error").html(errors.image)
					}
				} else {
					window.location.href = '{{ url()->current() }}';
				}
			}
		});
	});
</script>

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

@yield('customJs')
</body>
</html>