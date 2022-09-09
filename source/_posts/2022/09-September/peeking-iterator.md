---
extends: _layouts.post
section: content
title: Peeking iterator
problemUrl: https://leetcode.com/problems/peeking-iterator/
date: 2022-09-09
categories: [design]
---

We will use a current value property in the class to keep track of current value of the iterator. For rest of the functionality we will just relay the behaviour of the original iterator.

```python
# Below is the interface for Iterator, which is already defined for you.
#
# class Iterator:
#     def __init__(self, nums):
#         """
#         Initializes an iterator object to the beginning of a list.
#         :type nums: List[int]
#         """
#
#     def hasNext(self):
#         """
#         Returns true if the iteration has more elements.
#         :rtype: bool
#         """
#
#     def next(self):
#         """
#         Returns the next element in the iteration.
#         :rtype: int
#         """

class PeekingIterator:
    def __init__(self, iterator):
        """
        Initialize your data structure here.
        :type iterator: Iterator
        """
        self.iterator = iterator
        self.current = self.iterator.next()
        
    def peek(self):
        """
        Returns the next element in the iteration without advancing the iterator.
        :rtype: int
        """
        return self.current
        
    def next(self):
        """
        :rtype: int
        """
        val = self.current
        self.current = self.iterator.next() if self.iterator.hasNext() else None
        return val

    def hasNext(self):
        """
        :rtype: bool
        """
        return self.current is not None

# Your PeekingIterator object will be instantiated and called as such:
# iter = PeekingIterator(Iterator(nums))
# while iter.hasNext():
#     val = iter.peek()   # Get the next element but not advance the iterator.
#     iter.next()         # Should return the same value as [val].
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`