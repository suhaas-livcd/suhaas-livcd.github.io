---
layout: wiki
title: NSS Transcendence
thumbnail: /projects/images/transcendence/1_trans_thumbnail.png
tagline: Simple responsive website for competitions
sort-key: 10
meta-title: Project NSS Transcendence
meta-description: A project of National Service Scheme (NSS)
meta-image: /projects/images/transcendence/1_trans_thumbnail.png
tags: [projects, web-developement, karunya]
disableComments: true
---

{% include toc.md %}
[![NSS_TRANS_PAGES](https://img.shields.io/badge/NSS_Transcendence2k17-Pages-success??style=plastic&logo=github)](https://suhaas-livcd.github.io/NSS-Transcedence-1617/) [![NSS_TRANS_GITHUB](https://img.shields.io/badge/<&nbsp;>&nbsp;Code-Github-black)](https://github.com/suhaas-livcd/NSS-Transcedence-1617)
## Transcendence2K17

<img src="/projects/images/transcendence/1_trans_thumbnail.png" align="center" title="MainScreen" width="200" height="200"> :link:  <img src="/projects/images/transcendence/2_trans_nsslogo.png" align="center" title="MainScreen" width="150" height="150">  :link: <img src="/projects/images/transcendence/3_trans_unilogo.png" align="center" title="MainScreen" width="150" height="150">



[Transcendence](https://suhaas-livcd.github.io/NSS-Transcedence-1617/) is a mega event organised by [Karunya University](http://www.karunya.edu/) as a part of [National Service Scheme (NSS)](https://nss.gov.in) activity. Children from nearby schools participate where there are around 2 age groups and 20 events. This provides young students a platform to show case their professional skills and to discover their hidden talents in a competitive spirit.

This site was developed using bootstrap and different components were embedded in it such as [Carousel](https://owlcarousel2.github.io/OwlCarousel2/), Event timer, and Google Forms for saving user content and feedback.
Stack : Html 5, CSS3, JS
Some key issues that we wanted to achiever were
- Fully Responsive
- Browser Compatibility
- Clear & Unique Design
- Clean Typography

If you have wondering, how blinking cursor <span class="blinking-cursor">|</span> at the start of the page was done, well you are right using keyframes. Please find below code snippet

<style>
    .blinking-cursor {
  font-weight: 800;
  font-size: 20px;
  color: #ffffff;
  animation: 1s blink step-end infinite;
}

@keyframes blink {
  from, to {
    color: transparent;
  }
  50% {
    color: red;
  }
}
</style>

``` css
.blinking-cursor {
  font-weight: 200;
  font-size: 30px;
  color: #ffffff;
  animation: 1s blink step-end infinite;
}

@keyframes blink {
  from, to {
    color: transparent;
  }
  50% {
    color: white;
  }
}
```

## Next: [Karunya For Need](/projects/karunya-for-need)