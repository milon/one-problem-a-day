---
extends: _layouts.post
section: content
title: Flatten nested list iterator
problemUrl: https://leetcode.com/problems/flatten-nested-list-iterator/
date: 2022-09-27
categories: [queue, design]
---

We will iterate over the nested list, and go through each element and add that to a queue. Then when we need to check the next, we can pop the value from the queue. For the hasNext, we can just check whether the queue is empty or not.

```python
# """
# This is the interface that allows for creating nested lists.
# You should not implement it, or speculate about its implementation
# """
#class NestedInteger:
#    def isInteger(self) -> bool:
#        """
#        @return True if this NestedInteger holds a single integer, rather than a nested list.
#        """
#
#    def getInteger(self) -> int:
#        """
#        @return the single integer that this NestedInteger holds, if it holds a single integer
#        Return None if this NestedInteger holds a nested list
#        """
#
#    def getList(self) -> [NestedInteger]:
#        """
#        @return the nested list that this NestedInteger holds, if it holds a nested list
#        Return None if this NestedInteger holds a single integer
#        """

class NestedIterator:
    def __init__(self, nestedList: [NestedInteger]):
        self.arr = collections.deque()
        self.flattenList(nestedList)
    
    def next(self) -> int:
        return self.arr.pop()
    
    def hasNext(self) -> bool:
        return len(self.arr)
        
    def flattenList(self, nestedList):
        for item in nestedList:
            if item.isInteger():
                self.arr.appendleft(item.getInteger())
            else:
                self.flattenList(item.getList())
         
# Your NestedIterator object will be instantiated and called as such:
# i, v = NestedIterator(nestedList), []
# while i.hasNext(): v.append(i.next())
```

Time Complexity: `O(n)`, for initializw, `O(1)` for other operations <br/>
Space Complexity: `O(n)`, n is the size of the queue.