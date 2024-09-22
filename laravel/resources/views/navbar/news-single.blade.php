@extends('master.layout')
@section('section')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_2.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread">Blog</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/home">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a
                                href="/home/news">News <i class="ion-ios-arrow-forward"></i></a></span> <span>News Single <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-md-last ftco-animate">
                    <div class="container">
                        <h2>{{ $newsItem->title }}</h2>
                        <img src="{{ asset('images/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid mb-4">
                        <p>{{ $newsItem->content }}</p>
                        </div>
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Ai</a>
                            <a href="#" class="tag-cloud-link">Conference</a>
                            <a href="#" class="tag-cloud-link">IT</a>
                            <a href="#" class="tag-cloud-link">Technology</a>
                        </div>
                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="/images/rahmat.jpg" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h3>Rahmat Hidayat</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente
                                consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        </div>
                    </div>


                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="/images/alde.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>ALde Alanda Doe</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="/images/rasyidah.jpeg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Rasyidah</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="/images/hidra.png" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Hidra</h3>
                                            <div class="meta">October 03, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                                enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                            </p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="/images/rita.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Rita Afriyeni</h3>
                                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                        officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                        impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="/images/alde.jpg" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Alde Alanda</h3>
                                                            <div class="meta">October 03, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                                autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                                Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="/images/rahmat.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Rahmat Hidayat</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <li><a href="#">Computing <span>(12)</span></a></li>
                            <li><a href="#">Technology <span>(22)</span></a></li>
                            <li><a href="#">Software <span>(37)</span></a></li>
                            <li><a href="#">Ai <span>(42)</span></a></li>
                            <li><a href="#">Cloud <span>(14)</span></a></li>
                            <li><a href="#">Hardware <span>(140)</span></a></li>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        @foreach ($news as $item)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                    style="background-image: url('/images/{{ $item->image }}');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="/home/news/{{ $item->id }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span>
                                                {{ $item->created_at->format('M d, Y') }}</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">IT</a>
                            <a href="#" class="tag-cloud-link">AI</a>
                            <a href="#" class="tag-cloud-link">CLOUD</a>
                            <a href="#" class="tag-cloud-link">AETECH</a>
                            <a href="#" class="tag-cloud-link">SOTVI</a>
                            <a href="#" class="tag-cloud-link">AILC</a>
                            <a href="#" class="tag-cloud-link">IVIC</a>
                            <a href="#" class="tag-cloud-link">SOTVIA</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                            similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
