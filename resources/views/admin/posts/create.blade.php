<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf 

    <label for="title">Oggetto del post</label>
    <input type="text" name="title" id="" placeholder="inserirsci oggetto post">

    <label for="description">Corpo del post</label>
    <input type="text" name="content" id="" placeholder="cosa vorresti scrivere?">
    
    <button type="submit" value="Submit">aggiungi</button>
</form>