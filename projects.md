---
layout: page
title: Projects
---

- [Transcedence](http://suhaas-livcd.github.io/Projects/NSS_Transcedence/index.html)
<!-- <a href="https://github.com/othneildrew/Best-README-Template"><strong>Explore more »</strong></a>
 -->

- [KFN](http://suhaas-livcd.github.io/Projects/KFN/index.html)



<style type="text/css">
	
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px; /* 5px rounded corners */
}

/* Add rounded corners to the top left and the top right corner of the image */
img {
  border-radius: 5px 5px 0 0;
  float: ceter;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

.tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
}

.tags li {
  float: left; 
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: crimson;
  color: white;
}

.tag:hover::after {
   border-left-color: crimson; 
}
</style>


<div class="card">
  <div class="container">
    <h4><b>John Doe</b></h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. &nbsp;<a href="{{ site.baseurl }}{{ post.url }}">Read more</a></p>
<ul class="tags">
  <li><a href="#" class="tag">HTML</a></li>
  <li><a href="#" class="tag">CSS</a></li>
  <li><a href="#" class="tag">JavaScript</a></li>
</ul>
    
  </div>
</div>

<br>

<div class="card">
  <div class="container">
    <h4><b>John Doe</b></h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...</p>
    <a href="{{ site.baseurl }}{{ post.url }}">Read more</a>
  </div>
</div>