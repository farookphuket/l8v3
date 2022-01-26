# l8v3




> l8v3 is laravel8 using vue3 project created on 21 Jan 2022 
> this project is to make me learn more of the "vue 3","Laravel 8" library 
> the truth of me sad but true was
> ***I cannot create anything at all without the library*** really.







## TH Thailand is my country

> Thailand is my country I've born here ,I'll live here ,I'll die here. 
> I love my country so I just want you to know I am Thai man.

> โปรเจคนี้สร้างเมื่อ 21 มกรา 65 เพื่อฝึกฝนวิชา ผมอาจจะไม่เขียนภาษาไทยมากนัก ผมไม่ได้กระแดะ 
> ดัดจริตหรอกนะ แต่ภาษาอังกฤษผมจิ้มได้คล่องกว่า แล้วอีกอย่าง 
> เพราะว่าภาษาไทยผมต้องจิ้มหลายตัว เมื่อเทียบกับภาษาอังกฤษ 

[thai_flag]:https://image.shutterstock.com/image-illustration/thailand-flag-drawing-by-pastel-260nw-126636206.jpg

![my country][thai_flag]








## =========== Agent 
> copy code from `https://github.com/jenssegers/agent`
> on 23 Jan 2022


## =========== Custom Helper 

> copy code from 
> https://www.itsolutionstuff.com/post/laravel-8-create-custom-helper-functions-tutorialexample.html
> on 23 Jan 2022




# =========== Report 




## ========= date 25 Jan 2022 
> update profile system.
> the user have to confirm his password to make a change to his profile such 
> as change "name,email,password". 

> to protect the route :

```
// user id came from Auth::user()->id that has set in the x_pub.x.blade.php 
// file
export const user_id = window.user_id 

{
name:Profile,
path:'/profile',
beforeEnter:(to,from,next)=>{
    if(!user_id){
        next({name:'LoginPage'})
    }else{
        next()
    }
},
},


```

> to prevent user from enter the non exists page 
> create the new page call "PageNotFound" 

```
// redirect not exists page to page-not-found


// import the PageNotFound component in router 
import PageNotFound from '../pages/PageNotFound.vue'

{
name:'PageNotFound',
path: '/page-not-found',
component:PageNotFound,
},
{
    path: '/:pathMatch(.*)*',
    beforeEach:(to,from,next)=>{
        next({name:'PageNotFound'}) // or which page you want to redirect
    },
}

```




[profile_page]:https://i.ibb.co/m6CV5Xt/profile-page.png
[profile_response_page]:https://i.ibb.co/3r4mdxR/profile-response-page.png



### ======= profile page
![profile normal page][profile_page]




### ====== profile response page
![profile response page][profile_response_page]





---



## ========= date 23 Jan 2022 
> register user with email confirmation.

---

## ========= Tools

1. Operation System : I use Arch-Linux on both PC and Computer.
2. Text Editor : I use Tmux,Vim(gvim)
3. Browser : google chrome,firefox,brave browser,chromium



---




[sexy_1]:http://1.bp.blogspot.com/_9DRIQ9xf9U4/TKZdUmZ2eaI/AAAAAAAABE0/PC_GRAPj0p4/s1600/sexy-girls-free-wallpapers002-sexy-girls.jpg 




## ============== see the girl 21 Jan 2022

![beautiful girl][sexy_1]
