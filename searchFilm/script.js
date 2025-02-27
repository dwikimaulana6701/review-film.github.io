var movie_list = {};
const STORAGE_MOVIE = "storage-movie";

// > > > > > > > > > > > >
// inisialisasi halaman
// > > > > > > > > > > > >

// load localStorage
if(movie_listFromLocal = localStorage.getItem(STORAGE_MOVIE)){
    movie_list = JSON.parse(movie_listFromLocal);
    
    for(var key in movie_list){
        createList(key, movie_list[key]);
    }
}

// > > > > > > > > > > > >
// aksi dalam halaman
// > > > > > > > > > > > >

$(document).ready(function(){
    // add movie
    $('.add').click(function(){
        add();
    });

    // delete movie
    $('tbody').on('click', '.delete', function(){
        $(this).parent('tr').remove();
        syncLocalStorage('DELETE', $(this).prev().prev().text());
    });

    // sort by name
    $('table').on('click', '.judul', function(){
        sort('tbody', 'tr', '.namaAnime');
    });

    // sort by rating
    $('table').on('click', '.rate', function(){
        sort('tbody', 'tr', '.nilai');
    });

    // search
    $('.myInput').on('keyup', function(){
        var value = $(this).val().toLowerCase();
        $('.table-item').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
})


//functions//

// membuat list
function createList(namaAnime, nilai){
    var newMovie = 
    `<tr class='table-item'>
        <td class='namaAnime'>${namaAnime}</td>
        <td class='nilai'>${nilai}</td>
        <td class='delete'>Delete</td>
    </tr>`;

    $('table').append(newMovie);
}

// sinkron dengan localStorage
function syncLocalStorage(activity, namaAnime, nilai){
    switch(activity){
        case 'ADD':
            movie_list[namaAnime] = nilai;
            break;
        case 'DELETE':
            delete movie_list[namaAnime];
            break;
        default:
            break;
    }

    localStorage.setItem(STORAGE_MOVIE, JSON.stringify(movie_list));
    return;
}

// add function for input name
function add(){
    var movie_name = $('.name').val();
    var movie_rating = $('.rating').val();

    createList(movie_name, movie_rating);

    syncLocalStorage('ADD', movie_name, movie_rating);

    $('.name').val('');
    $('.rating').val('');
}

// sort function
function sort(parent, child, grandchild){
    $(parent).children(child).sort(function(a, b){
        var A = $(a).children(grandchild).text().toUpperCase();
        var B = $(b).children(grandchild).text().toUpperCase();

        if(grandchild == '.nilai'){
            return (A > B) ? -1 : (A > B) ? 1 : 0;
        }else{
            return (A < B) ? -1 : (A > B) ? 1 : 0;
        }
    }).appendTo(parent);
}













// cek localStorage
// if(typeof(Storage) !== undefined){
//     alert('Memori Lokal Tersedia');
// }else{
//     alert('local storage unavailable, your data will gone after page reload');
// }