<!DOCTYPE html>
<html>
<head>
    <title>Create Rat</title>
</head>
<body>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form method="POST" action="/rats">
    @csrf

    <input name="name" placeholder="Name" required>

    <input name="registered_name" placeholder="Registered Name">

    <input name="breeder_reference" placeholder="Breeder Ref">

    <select name="sex">
        <option>Male</option>
        <option>Female</option>
    </select>

    <input type="date" name="dob">
    <input type="date" name="dod">

    <select name="variety">
        <option>Standard</option>
        <option>Rex</option>
        <option>Tailless</option>
        <option>Hairless</option>
        <option>Satin</option>
        <option>Dumbo</option>
        <option>Bristle Coat</option>
        <option>Velveteen</option>
        <option>Teddy Rex</option>
    </select>

    <select name="color">
        <option>Black</option>
        <option>Platinum</option>
        <option>Agouti</option>
    </select>

    <input name="silvered" placeholder="Silvered">

    <select name="markings">
        <option>Self</option>
        <option>Berkshire</option>
        <option>Hooded</option>
    </select>

    <select name="eye_color">
        <option>Black</option>
        <option>Pink</option>
        <option>Ruby</option>
        <option>Odd Eye</option>
    </select>

    <select name="ear_set">
        <option>Dumbo</option>
        <option>Top</option>
    </select>

    <select name="breeder_id">
        <option value="">None</option>
        @foreach($breeders as $breeder)
            <option value="{{ $breeder->id }}">
                {{ $breeder->rattery }}
            </option>
        @endforeach
    </select>

    <label>
        <input type="checkbox" name="is_owned" checked>
        Owned
    </label>

    <label>
        <input type="checkbox" name="is_pedigree_only">
        Pedigree Only
    </label>

    <button type="submit">Create Rat</button>
</form>

</body>
</html>