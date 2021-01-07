<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Flash message
```php
/**
 * Flash message Show at index.blade.php page
 */
@include('validation')

/**
 * Data insert at StudentController.php page
 */
Student::create([
    'name'  => $request -> name,
    'email' => $request -> email,
    'cell'  => $request -> cell,
    'uname' => $request -> uname,
    //'photo' => $val -> photo,
]);
return redirect() -> back() -> with('success', 'Student added successfull');

/**
 * At validation.blade.php page
 */
@if( $errors -> any() )
    <p class="alert alert-danger">{{ $errors -> first() }} !<button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if ( Session::has('success') )
	<p class="alert alert-success">{{ Session::get('success') }} !<button class="close" data-dismiss="alert">&times;</button></p>
@endif
```
### Photo Uploading System
```php
// <input name="photo" class="form-control" type="file"> At form

/**
 * At StudentController.php page
 */
if ( $request -> hasFile('photo') ) {
	$image = $request -> file('photo');
    //Photo Unique Name
    $photo_name = md5( time() . rand() ) . '.' . $image -> getClientOriginalExtension();
    $image -> move( public_path('media/students/'), $photo_name);
}else{
	$photo_name = '';
}
//Sent to Table
Student::create([
    'photo' => $photo_name,
]);
return redirect() -> back() -> with('success', 'Student added successfull');
```
### Data show
```php
/**
 * At StudentController.php page
 */
public function allStudent()
{
	$all_students = Student::latest() -> get();
	return view('student.all', compact('all_students'));
}
/**
 * At data.blade.php page
 */
@foreach ( $all_students as $student )
	<tr>
		<td>{{ $loop -> index + 1 }}</td>
		<td>{{ $student -> name }}</td>
		<td>{{ $student -> email }}</td>
		<td>{{ $student -> cell }}</td>
		<td><img src="{{ URL::to('media/students') . '/' . $student -> photo }}" alt=""></td>
	</tr>
@endforeach
```