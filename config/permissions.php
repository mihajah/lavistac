<?php
return [
   'Member'=>[
      'allowed' =>[
         //user
         'Users/changePassword',
         'Users/redirectLogin',
         'Users/logout',
         //announces
         'Announces/myAnnounce',
         'Announces/editMyAnnounce',
         'Announces/beOnline',
         //pics
         'Pics/myPics',
         'Pics/replace',
         'Pics/delete',
         'Pics/add'
      ]
   ],
   'FreeMember'=>[
      'allowed' =>[
         //user
         'Users/changePassword',
         'Users/redirectLogin',
         'Users/logout',
         //announces
         'Announces/myAnnounce',
         'Announces/editMyAnnounce',
         //pics
         'Pics/myPics',
         'Pics/replace',
         'Pics/delete'
      ]
   ]
];
