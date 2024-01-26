<div class="container">
    @include('livewire.modals.modal')
    <div class="profile">
        <h2 class="mt-3" style="font-family: Comic Sans MS">Recent Posts</h2>
    </div>
    <div class="post-body">
        <div class="col-md-6 offset-3">
            @if (session('message'))
                <div id="messagee" class="alert text-black text-center text-black">{{ session('message') }}</div>
            @endif
            <select class="form-select mb-1" id="searchh" wire:model.lazy="title">
                <option value="All">All</option>
                <option value="Feeling Sick">Feeling Sick</option>
                <option value="Feeling Sad">Feeling Sad</option>
                <option value="Feeling Emotional">Feeling Emotional</option>
                <option value="Feeling Broken">Feeling Broken</option>
                <option value="Feeling Happy">Feeling Happy</option>
                <option value="Feeling Cute">Feeling Cute</option>
                <option value="Feeling Loved">Feeling Loved</option>
                <option value="Feeling Thankful">Feeling Thankful</option>
                <option value="Feeling Angry">Feeling Angry</option>
                <option value="Feeling Crazy">Feeling Crazy</option>
                <option value="Feeling Hopeful">Feeling Hopeful</option>
                <option value="Feeling Proud">Feeling Proud</option>
                <option value="Feeling Fresh">Feeling Fresh</option>
                <option value="Feeling Blessed">Feeling Blessed</option>
                <option value="Feeling Bad">Feeling Bad</option>
                <option value="Feeling Rich">Feeling Rich</option>
                <option value="Feeling Betrayed">Feeling Betrayed</option>
                <option value="Feeling Sleepy">Feeling Sleepy</option>
                <option value="Feeling Nervous">Feeling Nervous</option>
                <option value="Feeling Uncomfortable">Feeling Uncomfortable</option>
                <option value="Feeling Cold">Feeling Cold</option>
                <option value="Feeling Lol">Feeling Lol</option>
                <option value="Feeling In love">Feeling In love</option>
                <option value="Feeling Incomplete">Feeling Incomplete</option>
                <option value="Feeling Cool">Feeling Cool</option>
                <option value="Feeling Wow">Feeling Wow</option>
                <option value="Feeling Cry">Feeling Cry</option>
                <option value="Feeling Explode">Feeling Explode</option>
                <option value="Feeling Disguise">Feeling Disguise</option>
            </select>
            <div class="col p-3 shadow-sm rounded mb-5" id="write">
                <input type="text" class="write-2 form-control" placeholder="Search" wire:model.lazy="search">
            </div>
            @foreach ($recents as $recent)
            <div class="card shadow-md mt-3" style="width: 560px">
                <div class="card-header" id="cardd">
                    @role('admin')
                    <span id="dot-icon" class="float-end dropdown dropstart">
                        <span class="fa-solid fa-ellipsis-vertical text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#click-delete-recent" wire:click="delete({{ $recent->id }})">Delete</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#click-edit-recent" wire:click="editPosts({{ $recent->id }})">Edit</a></li>
                        </ul>
                    </span>
                    @endrole
                    <span class="float-end" id="titlee">
                        <span class="float-end" id="titleee">-{{ $recent->title }}</span>
                        <span class="
                        {{($recent->title === 'Feeling Sick')? 'font-icon fa-solid fa-face-thermometer': '' }}
                        {{($recent->title === 'Feeling Sad')? 'font-icon fa-solid fa-face-sad-sweat': '' }}
                        {{($recent->title === 'Feeling Emotional')? 'font-icon fa-solid fa-face-holding-back-tears': '' }}
                        {{($recent->title === 'Feeling Broken')? 'font-icon-heart fa-solid fa-heart-crack': '' }}
                        {{($recent->title === 'Feeling Happy')? 'font-icon fa-solid fa-face-smile': '' }}
                        {{($recent->title === 'Feeling Cute')? 'font-icon fa-solid fa-face-grin-stars': '' }}
                        {{($recent->title === 'Feeling Loved')? 'font-icon fa-solid fa-face-smile-hearts': '' }}
                        {{($recent->title === 'Feeling Thankful')? 'font-icon fa-solid fa-face-smiling-hands': '' }}
                        {{($recent->title === 'Feeling Angry')? 'font-icon fa-solid fa-face-swear': '' }}
                        {{($recent->title === 'Feeling Crazy')? 'font-icon fa-solid fa-face-woozy': '' }}
                        {{($recent->title === 'Feeling Hopeful')? 'font-icon fa-solid fa-face-awesome': '' }}
                        {{($recent->title === 'Feeling Proud')? 'font-icon fa-solid fa-face-beam-hand-over-mouth': '' }}
                        {{($recent->title === 'Feeling Fresh')? 'font-icon fa-solid fa-face-clouds': '' }}
                        {{($recent->title === 'Feeling Blessed')? 'font-icon fa-solid fa-face-smile-halo': '' }}
                        {{($recent->title === 'Feeling Bad')? 'font-icon fa-solid fa-face-angry-horns': '' }}
                        {{($recent->title === 'Feeling Rich')? 'font-icon fa-solid fa-face-tongue-money': '' }}
                        {{($recent->title === 'Feeling Betrayed')? 'font-icon fa-solid fa-face-weary': '' }}
                        {{($recent->title === 'Feeling Sleepy')? 'font-icon fa-solid fa-face-sleeping': '' }}
                        {{($recent->title === 'Feeling Nervous')? 'font-icon fa-solid fa-face-persevering': '' }}
                        {{($recent->title === 'Feeling Uncomfortable')? 'font-icon fa-solid fa-face-pleading': '' }}
                        {{($recent->title === 'Feeling Cold')? 'font-icon fa-solid fa-face-icecles': '' }}
                        {{($recent->title === 'Feeling Lol')? 'font-icon fa-solid fa-face-grin-tears': '' }}
                        {{($recent->title === 'Feeling In loved')? 'font-icon fa-solid fa-face-kiss-wink-hearts': '' }}
                        {{($recent->title === 'Feeling Incomplete')? 'font-icon fa-solid fa-face-dotted': '' }}
                        {{($recent->title === 'Feeling Cool')? 'font-icon fa-solid fa-face-sunglasses': '' }}
                        {{($recent->title === 'Feeling Wow')? 'font-icon fa-solid fa-face-surprise': '' }}
                        {{($recent->title === 'Feeling Cry')? 'font-icon fa-solid fa-face-sad-cry': '' }}
                        {{($recent->title === 'Feeling Explode')? 'font-icon fa-solid fa-face-explode': '' }}
                        {{($recent->title === 'Feeling Disguise')? 'font-icon fa-solid fa-face-disguise': '' }}
                        "></span></span>
                        <img class="profile2" src="
                        {{($recent->user->gender === 'Male') ? asset('images/male.png') : ''}}
                        {{($recent->user->gender === 'Female') ? asset('images/female.png') : ''}}
                        {{($recent->user->gender === 'Transgender') ? asset('images/transgender.png') : ''}}
                        {{($recent->user->gender === 'Bisexual') ? asset('images/bisexual.png') : ''}}
                        ">
                    <span class="name">{{ $recent->user->name }}</span><br>
                    <span class="time">{{ $recent->created_at->format('g:i A') }}</span>
                </div>
                <div class="card-body" id="cardd">
                    <div class="contentt"><span>{{ $recent->content }}</span></div>
                </div>
                <div class="card-footer" id="cardd">
                    <span id="lc"><i class="fa-light fa-thumbs-up"></i> Like</span>
                    <span id="lc"><i class="fa-light fa-message"></i> Comment</span>
                    <span class="float-end" id="genderr">&nbsp;{{ $recent->user->gender }}</span>
                    <div class="float-end
                        {{($recent->user->gender === 'Male')? 'male fa-regular fa-mars': '' }}
                        {{($recent->user->gender === 'Female')? 'female fa-regular fa-venus': '' }}
                        {{($recent->user->gender === 'Bisexual')? 'bisexual fa-regular fa-venus-mars': '' }}
                        {{($recent->user->gender === 'Transgender')? 'transgender fa-regular fa-transgender': '' }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @if($recents->isEmpty())
        <div class="text-gray-500">
            <h1 class="text-center">No
                <span class="search1 {{ ($search === null ? 'all': '') }}">{{ $search }}</span>
                <span class="search1{{ ($title === null ? 'all': '') }}">{{ $title }}</span>
                post.
            </h1>
        </div>
    @endif
    <button onclick="topFunction()" id="myBtn" title="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
</div>

<style>
    .name {
        color: whitesmoke;
        font-size: 20px;
        text-decoration: none;
        cursor: pointer;
    }
    .name:hover {
        color: rgb(204, 202, 202);
    }
    #searchh {
        background-color: rgba(116, 115, 115, 0.661);
        color: whitesmoke;
    }
    #cardd {
        background-color: rgba(116, 115, 115, 0.661);
        color: whitesmoke;
    }
    .time {
        font-size: 13px;
        margin-left: 45px;
        opacity: 0.8;
    }
    .contentt span {
        font-size: 19px;
    }
    #titlee {
        color: rgb(21, 21, 103);
        font-weight: bold;
        font-style: italic;
        font-size: 14px;
        opacity: 0.8;
    }
    #titleee {
        margin-right: 15px;
        margin-top: 5px;
    }
    #genderr {
        color: rgb(21, 21, 103);
        font-weight: bold;
        font-style: italic;
        font-size: 13px;
        opacity: 0.8;
    }
    .alert {
        background-color: rgba(0, 0, 0, 0.12);
    }
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 40px;
        z-index: 99;
        font-size: 25px;
        border: none;
        outline: none;
        background-color: rgb(3, 126, 138);
        color: rgb(255, 255, 255);
        cursor: pointer;
        border-radius: 4px;
        padding: 5px 10px 5px 10px;
    }
    #myBtn:hover {
        background-color: rgb(12, 142, 154);
    }
    #write {
        background-color: rgba(116, 115, 115, 0.661);
    }
    .write-2 {
        border-radius: 20px;
    }
    #lc {
        padding: 5px 50px 5px 50px;
        border-radius: 5px;
        cursor: pointer;
    }
    #lc:hover {
        background-color: rgba(89, 88, 88, 0.593);
    }
    .male {
        background-color: rgb(5, 5, 147);
        padding: 3px;
        border-radius: 3px;
    }
    .female {
        background-color: rgb(243, 27, 239);
        padding: 3px;
        border-radius: 3px;
    }
    .bisexual {
        background-image: linear-gradient(to left, violet, indigo, blue, green, rgba(255, 255, 0, 0.275), rgba(255, 166, 0, 0.407), red);
        padding: 3px;
        color: rgb(229, 220, 229);
        border-radius: 3px;
    }
    .transgender {
        background-image: linear-gradient(to left, rgb(42, 162, 242), rgb(206, 115, 189),rgb(245, 229, 246), rgb(206, 115, 189), rgb(42, 162, 242));
        padding: 3px;
        color: rgb(23, 17, 84);
        border-radius: 3px;
    }
    .font-icon {
        font-size: 30px;
        border-radius: 50%;
        padding: 2px;
        opacity: 0.8;
        color: rgb(241, 241, 33);
    }
    .font-icon-heart {
        font-size: 30px;
        border-radius: 50%;
        padding: 2px;
        color: red;
        opacity: 0.8;
    }
    #dot-icon {
        padding: 5px 12px 5px 12px;
        background-color: rgb(206, 204, 204);
        border-radius: 50%;
        cursor: pointer;
    }
    #dot-icon:hover {
        background-color: rgb(230, 224, 224);;
    }
    .profile2 {
        width: 40px;
        border: 1px solid rgb(66, 65, 65);
        padding: 4px;
        height: 40px;
        border-radius: 50%;
    }
    #write {
        background-color: rgba(116, 115, 115, 0.661);
    }
    .write-2 {
        border-radius: 20px;
    }
    .write-2:hover {
        background-color: rgba(255, 255, 255, 0.789);
    }
    #modall {
        background-color: rgb(52, 52, 52);
        margin-top: 20%;
    }
    .title1 {
        margin-left: 38%;
    }
    .title2 {
        margin-left: 35%;
    }
    .title3 {
        margin-left: 8%;
    }
    .close {
        border-radius: 50%;
        background-color: rgb(65, 64, 64);
        border: 1px solid rgb(65, 64, 64);
        width: 30px;
    }
    .close span {
        color: whitesmoke;
    }
    .close:hover {
        background-color: rgb(125, 121, 121);
    }
    #rm {
        background-color: rgb(52, 52, 52);
        color: whitesmoke;
    }
    #text-area {
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
        color: white;
    }
    .search1::before {
        content: '"';
    }
    .search1::after {
        content: '"';
    }
    .all {
        display: none;
    }
</style>


<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    setTimeout(function() {
        var msg = document.getElementById("messagee");
        msg.parentNode.removeChild(msg);
    }, 1500);
</script>
