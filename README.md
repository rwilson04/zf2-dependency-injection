Zend Sample Application with dependency injection
=======================

Introduction
------------
This is my attempt at creating objects the recommended way, using closures in the Module's config methods. I started with Zend's Skeleton Application
Building depend on BrickFactory 
BrickFactory depends on Brick
and Bricks need a color to be instantiated

I wasn't sure of the best method for creating multiple instances of an injected object, so I came up with the BrickFactory, which simply clones the original Brick and sets its new color. 
