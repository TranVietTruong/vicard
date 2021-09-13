import Register from './views/register'
import Login from './views/login'
import ForgetPassword from './views/forgetPassword'
import Home from './views/home'
import Error404 from './views/error404'
import ListTemplate from './views/home/listTemplate'
import Info from './views/home/info'
import sendNoti from './views/home/sendNoti'

import store from './store'


const isAuthenticated = (to, from, next) => {
  if(store.getters.authenticated) {
    return next()
  } else {
    return next({name:'login'})
  }
}

const checkAuth = (to, from, next) => {
  if(store.getters.authenticated) {
    return next({name:'home'})
  } else {
    return next()
  }
}

export const routes = [
  {
    path: '/',
    name: 'register',
    component: Register,
    beforeEnter: checkAuth
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    beforeEnter: checkAuth
  },
  {
    path: '/forget-password',
    name: 'forgetPassword',
    component: ForgetPassword
  },
  {
    path: '/home',
    name: 'home',
    component: Home,
    beforeEnter: isAuthenticated,
    children: [
      {
        path: 'template',
        name: 'listTemplate',
        component: ListTemplate,
        beforeEnter: isAuthenticated,
      },
      {
        path: 'info',
        name: 'info',
        component: Info,
        beforeEnter: isAuthenticated,
      },
      // {
      //   path: 'send-noti',
      //   name: 'sendNoti',
      //   component: sendNoti,
      //   beforeEnter: isAuthenticated,
      // }
    ]
  },
  {
    path: '*',
    name: '404',
    component: Error404
  }
];
