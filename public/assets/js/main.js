function ajaxBlogs(keyword, categories, page, showAllBlogs) {
    $.ajax({
        url: "/api/blogs",
        method: "get",
        data: {
            keyword: keyword,
            categories: categories,
            page: page
        },
        success: function (response) {
            console.log(response)
            // console.log(response.posts);
            // console.log(response.page);
            // console.log(response.posts.links);
            if ((response.posts.data).length !== 0) {
                showAllBlogs(response.posts.data, response.posts.links, response.page);
            } else {
                $("#blogs").html("<h3 class='text-danger notification'>Sorry, the blog with your search doesn't exists yet in our database. Please contact administrator in case you want to add that blog to our collection if we somehow forget it... </h3>");
            }
        },
        error: function (xhr) {
            let code = xhr.status;
            console.log(xhr);
            console.log(code);
        },
        dataType: "json"
    });
}

//region PRINTING DATE FORMAT OF REVIEWS
function printDate(dateForCheck){
    //2021-03-07T21:45:17.000000Z
    let currentDate = dateForCheck.toString();

    let date = currentDate.split('T')[0];
    let day = date.split('-')[2];
    let month = date.split('-')[1];
    let year = date.split('-')[0];

    return `${day}/${month}/${year}`;
}
//endregion



$(document).ready(function () {
    let currentYear = new Date().getFullYear();
    $('.current_year').html(currentYear);

    var keyword = "";
    var categories = [];
    var page = 1;

//region CONSOLE.LOGS FOR FILTERS/PAGES/SEARCH
//     console.log("Key:" + keyword);
//     console.log("Categories:" + categories);
    //console.log("Page:" + page);
    //endregion

    ajaxBlogs(keyword, categories, page, showAllBlogs)

    //region CONSOLE.LOGS FOR FILTERS/PAGES/SEARCH
    // console.log("Key:" + keyword);
    // console.log("Categories:" + categories);
    //console.log("Page:" + page);
    //endregion

    //region PAGINATION
    $(document).on("click",".page-link", function (e) {
        e.preventDefault();
        page = parseInt($(this).data('page'));

        //region CONSOLE.LOGS FOR FILTERS/PAGES/SEARCH
        // console.log("Key:" + keyword);
        // console.log("Categories:" + categories);
        //console.log("Page:" + page);
        //endregion

        ajaxBlogs(keyword, categories, page, showAllBlogs)
    })
    //endregion

    //region SEARCH
    $("#keyword").on("keyup", function(){
        // console.log($(this).val().trim());
        keyword = $(this).val().trim();

        //region CONSOLE.LOGS FOR FILTERS/PAGES/SEARCH
        // console.log("Key:" + keyword);
        // console.log("Categories:" + categories);
        //console.log("Page:" + page);
        //endregion

        ajaxBlogs(keyword, categories, page, showAllBlogs)
    });
    //endregion

    //region FILTER BY TYPES
    $(".categories").on("change", function(e){
        e.preventDefault();

        //region CONSOLE.LOGS FOR FILTERS/PAGES/SEARCH
        // console.log("Key:" + keyword);
        // console.log("Categories:" + categories);
        //console.log("Page:" + page);
        //endregion

        let category = parseInt($(this).val());
        console.log(category);

        categories.includes(category) ? categories.splice (categories.indexOf(category), 1) : categories.push(category)

        //console.log(categories)
        ajaxBlogs(keyword, categories, page, showAllBlogs)
    });
    //endregion

    //region PRINTING BLOGS AND PAGINATION
    function showAllBlogs(blogs, pages, currentPage) {
        // console.log(pages);
        let output = ``;
        blogs.forEach(blog => {
            output += `
                <article class="blog__post col-sm-12 col-md-6 mb-5">
                    <div class="blog__post__media">
                        <figure class="post__media__image">
                            <img height='200' src="${publicImagesStorage + '/' +  blog.image.path}" class="img-fluid"/>
                        </figure>
                    </div>
                    <div class="blog__post__body">
                        <header class="blog__post__header">
                            <aside class="blog__post__cat">
                                <div class="cat__links">
                                    <span class="screen__reader__txt"></span>
                                    <a href="#">${blog.category.name}</a>
                                </div>
                            </aside>
                            <h3 class="blog__post__title">
                                <a href="${url + '/api/blogs/' + blog.id}" data-room="${blog.id}">${blog.title}</a>
                            </h3>
                            <aside class="blog__post__footer">
                                      <span class="blog__post__footer__author">
                                        <i class="fas fa-user-circle"></i>Last updated: ${blog.updated_at == null ? blog.published_at : printDate(blog.updated_at)} by
                                      </span>
                                <span class="blog__post__footer__date"> ${blog.user.firstname} ${blog.user.lastname}</span>
                            </aside>
                        </header>
                    </div>
                </article>`;
        });


        output += `<nav>
                            <ul class="pagination">`
        var lastPage = 0;
        //region PRINTING PAGINATION
        //console.log(pages);
        for(page of pages){
            // console.log(pages);
            if(pages.length <= 3){
                output += "";
            }else{
                output += `
                        <li class="page-item ${page.active ? 'active' : ''}" >
                            <a class="page-link" data-page="${labelPage(currentPage,page.label,lastPage)}" href="#">${page.label}</a>
                        </li>
            `;
                lastPage++;
            }
        }
        function labelPage(currentPage, label, lastPage){
            //console.log(lastPage)
            if (label === "Next &raquo;"){
                lastPage--;
                console.log(currentPage)
                console.log(lastPage)
                if (parseInt(currentPage) + 1 <= lastPage)
                    return `${parseInt(currentPage) + 1}`
                else return 1
            }else if(label === "&laquo; Previous"){
                if (currentPage - 1 > lastPage)
                    return `${currentPage - 1}`
                else return 1
            }else
                return `${page.label}`
        }
        //endregion
        output += `</ul>
                        </nav>`
        $("#blogs").html(output);
    }
    //endregion
})
