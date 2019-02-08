<?php

$headerPhpDoc = "This file is part of the WoW-Apps/Symfony-Slack-Bot bundle for Symfony.\n"
    . "https://github.com/wow-apps/symfony-slack-bot\n"
    . "\n"
    . "For the full copyright and license information, please view the LICENSE\n"
    . "file that was distributed with this source code.\n"
    . "https://github.com/wow-apps/symfony-slack-bot/blob/master/LICENSE\n"
    . "\n"
    . "For technical documentation.\n"
    . "https://wow-apps.github.io/symfony-slack-bot/docs/\n"
    . "\n"
    . "Author Alexey Samara <lion.samara@gmail.com>\n"
    . "\n"
    . "Copyright 2016 WoW-Apps.";

return PhpCsFixer\Config::create()
    ->setRules([
        '@DoctrineAnnotation' => true,
        '@PHP71Migration' => true,
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'braces' => ['allow_single_line_closure' => true, 'position_after_anonymous_constructs' => 'same', 'position_after_control_structures' => 'same', 'position_after_functions_and_oop_constructs' => 'next'],
        'cast_spaces' => ['space' => 'single'],
        'class_attributes_separation' => ['elements' => ['method']],
        'class_definition' => ['multi_line_extends_each_single_line' => false, 'single_item_single_line' => false, 'single_line' => false],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_equal_normalize' => ['space' => 'single'],
        'doctrine_annotation_indentation' => ['ignored_tags' => ['abstract', 'access', 'code', 'deprec', 'encode', 'exception', 'final', 'ingroup', 'inheritdoc', 'inheritDoc', 'magic', 'name', 'toc', 'tutorial', 'private', 'static', 'staticvar', 'staticVar', 'throw', 'api', 'author', 'category', 'copyright', 'deprecated', 'example', 'filesource', 'global', 'ignore', 'internal', 'license', 'link', 'method', 'package', 'param', 'property', 'property-read', 'property-write', 'return', 'see', 'since', 'source', 'subpackage', 'throws', 'todo', 'TODO', 'usedBy', 'uses', 'var', 'version', 'after', 'afterClass', 'backupGlobals', 'backupStaticAttributes', 'before', 'beforeClass', 'codeCoverageIgnore', 'codeCoverageIgnoreStart', 'codeCoverageIgnoreEnd', 'covers', 'coversDefaultClass', 'coversNothing', 'dataProvider', 'depends', 'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp', 'group', 'large', 'medium', 'preserveGlobalState', 'requires', 'runTestsInSeparateProcesses', 'runInSeparateProcess', 'small', 'test', 'testdox', 'ticket', 'uses', 'SuppressWarnings', 'noinspection', 'package_version', 'enduml', 'startuml', 'fix', 'FIXME', 'fixme', 'override'], 'indent_mixed_lines' => false],
        'escape_implicit_backslashes' => ['double_quoted' => true, 'heredoc_syntax' => true, 'single_quoted' => false],
        'explicit_indirect_variable' => true,
        'function_declaration' => ['closure_function_spacing' => 'one'],
        'general_phpdoc_annotation_remove' => ['annotations' => []],
        'header_comment' => ['header' => $headerPhpDoc, 'comment_type' => 'comment', 'location' => 'after_declare_strict', 'separate' => 'both'],
        'increment_style' => ['style' => 'pre'],
        'linebreak_after_opening_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'method_argument_space' => ['ensure_fully_multiline' => false, 'keep_multiple_spaces_after_comma' => false, 'on_multiline' => 'ensure_fully_multiline'],
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'no_mixed_echo_print' => ['use' => 'echo'],
        'no_spaces_around_offset' => ['positions' => ['inside', 'outside']],
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->exclude('var')
        ->exclude('public')
        ->exclude('docker')
        ->exclude('bin')
        ->exclude('.githooks')
        ->in(__DIR__ . '/../../../')
    );
