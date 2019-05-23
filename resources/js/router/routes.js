function page(path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'home', component: page('home.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ]
  },

  { path: '/poll', name: 'poll.index', component: page('poll/index.vue') },
  { path: '/poll/create', name: 'poll.create', component: page('poll/create.vue') },

  {
    path: '/poll/:pollID', component: page('poll/main.vue'), children: [
      { path: '', redirect: { name: 'poll.show' } },
      { path: '/poll/:pollID', name: 'poll.show', component: page('poll/show.vue') },
      { path: '/poll/:pollID/result', name: 'poll.result', component: page('poll/result.vue') },
      { path: '/poll/:pollID/comments', name: 'poll.comments', component: page('poll/comment.vue') },
    ]
  },

  { path: '/user/:userID', name: 'user.show', component: page('user/show.vue') },

  { path: '*', component: page('errors/404.vue') }
]
