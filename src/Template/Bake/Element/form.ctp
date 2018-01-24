<%
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.1.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
use Cake\Utility\Inflector;

$fields = collection($fields)
->filter(function($field) use ($schema) {
   return $schema->columnType($field) !== 'binary';
});

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
   $fields = $fields->reject(function ($field) {
      return $field === 'lft' || $field === 'rght';
   });
}
%>
<nav class="navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-minimize">
         <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
         </button>
      </div>
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#"><?= __('<%= $pluralHumanName %>') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <% if (strpos($action, 'add') === false): %>
            <li><?= $this->Form->postLink(
               __('Delete'),
               ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
               ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>)]
               )?>
            </li>
            <% endif; %>
            <li><?= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index']) ?></li>
         </ul>
      </div>
   </div>
</nav>

<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="card">
               <div class="header">
                  <h4 class="title"><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></h4>
               </div>
               <div class="content">
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->create($<%= $singularVar %>, ['novalidate']) ?>
                        <?php
                        <%
                        foreach ($fields as $field) {
                           if (in_array($field, $primaryKey)) {
                              continue;
                           }
                           if (isset($keyFields[$field])) {
                              $fieldData = $schema->column($field);

                              if (empty($fieldData['null'])) {
                                 if ($field == "attachment_id") {
                                    %>
                                    echo $this->Attachment->input('attachment_id',[
                                       'label' => 'Image',
                                       'types' =>['image/jpeg','image/png','image/gif'],
                                       'atags' => [],
                                       'profile' => 'default',
                                       'restrictions' => [
                                          Attachment\View\Helper\AttachmentHelper::TAG_RESTRICTED,
                                          Attachment\View\Helper\AttachmentHelper::TYPES_RESTRICTED
                                       ],
                                       'attachments' => []
                                    ]);
                                    <%
                                 }
                                 else {
                                    %>
                                    echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>,  'class'=>'form-control']);
                                    <%
                                 }
                              } else {
                                 %>
                                 echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %> , 'class'=>'form-control']);
                                 <%
                              }
                              continue;
                           }
                           if (!in_array($field, ['created', 'modified', 'updated'])) {
                              $fieldData = $schema->column($field);
                              if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
                                 %>
                                 echo $this->Form->input('<%= $field %>', ['empty' => true, 'class'=>'form-control']);
                                 <%
                              } else {
                                 %>
                                 echo $this->Form->input('<%= $field %>', ['class'=>'form-control']);
                                 <%
                              }
                           }
                        }
                        if (!empty($associations['BelongsToMany'])) {
                           foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                              %>
                              <%
                              if ($assocData['property'] == 'attachments') {
                                 %>
                                 echo $this->Attachment->input('Attachments',[
                                    'label' => 'Attachments',
                                    'types' =>['image/jpeg','image/png','image/gif'],
                                    'atags' => ['products'],
                                    'profile' => 'default',
                                    'restrictions' => [
                                       Attachment\View\Helper\AttachmentHelper::TAG_RESTRICTED,
                                       Attachment\View\Helper\AttachmentHelper::TYPES_RESTRICTED
                                    ],
                                    'attachments' => []
                                 ]);

                                 <%
                              } else {
                                 %>
                                 echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>, 'class'=>'form-control']);
                                 <%
                              }
                           }
                        }
                        %>
                        ?>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill pull-right']) ?>
                        <?= $this->Form->end() ?>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
