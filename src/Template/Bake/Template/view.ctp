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

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
->map(function($field) use ($immediateAssociations) {
   foreach ($immediateAssociations as $alias => $details) {
      if ($field === $details['foreignKey']) {
         return [$field => $details];
      }
   }
})
->filter()
->reduce(function($fields, $value) {
   return $fields + $value;
}, []);

$groupedFields = collection($fields)
->filter(function($field) use ($schema) {
   return $schema->columnType($field) !== 'binary';
})
->groupBy(function($field) use ($schema, $associationFields) {
   $type = $schema->columnType($field);
   if (isset($associationFields[$field])) {
      return 'string';
   }
   if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
      return 'number';
   }
   if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
      return 'date';
   }
   return in_array($type, ['text', 'boolean']) ? $type : 'string';
})
->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
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
         <a class="navbar-brand" href="#"><%= $singularHumanName %> - <?=h($<%= $singularVar %>-><%= $displayField %>) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?> </li>
            <li><?= $this->Html->link(__('New'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
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
                  <h3><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                     <% if ($groupedFields['string']) : %>
                     <% foreach ($groupedFields['string'] as $field) : %>
                     <% if (isset($associationFields[$field])) :
                     $details = $associationFields[$field];
                     %>
                     <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($details['property']) %>') ?></th>
                        <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                     </tr>
                     <% else : %>
                     <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                        <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                     </tr>
                     <% endif; %>
                     <% endforeach; %>
                     <% endif; %>
                     <% if ($associations['HasOne']) : %>
                     <%- foreach ($associations['HasOne'] as $alias => $details) : %>
                     <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?></th>
                        <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                     </tr>
                     <%- endforeach; %>
                     <% endif; %>
                     <% if ($groupedFields['number']) : %>
                     <% foreach ($groupedFields['number'] as $field) : %>
                     <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                        <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                     </tr>
                     <% endforeach; %>
                     <% endif; %>
                     <% if ($groupedFields['date']) : %>
                     <% foreach ($groupedFields['date'] as $field) : %>
                     <tr>
                        <th scope="row"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></th>
                        <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                     </tr>
                     <% endforeach; %>
                     <% endif; %>
                     <% if ($groupedFields['boolean']) : %>
                     <% foreach ($groupedFields['boolean'] as $field) : %>
                     <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                        <td><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></td>
                     </tr>
                     <% endforeach; %>
                     <% endif; %>
                  </table>
                  <% if ($groupedFields['text']) : %>
                  <% foreach ($groupedFields['text'] as $field) : %>
                  <div class="row">
                     <div class="col-sm-12">
                        <h4><?= __('<%= Inflector::humanize($field) %>') ?></h4>
                        <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
                     </div>
                  </div>
                  <% endforeach; %>
                  <% endif; %>
               </div>
            </div>
            <%
            $relations = $associations['HasMany'] + $associations['BelongsToMany'];
            foreach ($relations as $alias => $details):
            $otherSingularVar = Inflector::variable($alias);
            $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
            %>
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related <%= $otherPluralHumanName %>') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                           <% foreach ($details['fields'] as $field): %>
                           <th scope="col"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                           <% endforeach; %>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
                           <tr>
                              <%- foreach ($details['fields'] as $field): %>
                              <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
                              <%- endforeach; %>
                              <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </table>
                  <?php endif; ?>
               </div>
            </div>
            <% endforeach; %>

         </div>
      </div>
   </div>
</div>
