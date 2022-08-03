---
extends: _layouts.post
section: content
title: My calendar I
problemUrl: https://leetcode.com/problems/my-calendar-i/
date: 2022-08-03
categories: [tree]
---

We will create a binary search tree with all the events. If start if greater than root's end, we will insert it in right subtree, if end if less than root's start, then insert it in left subtree. If we can successfully insert an event, we return true, else false.

```python
class Event:
    def __init__(self, start, end):
        self.start = start
        self.end = end
        self.left = None
        self.right = None

class MyCalendar(object):
    def __init__(self):
        self.root = None
    
    def _bookHelper(self, start, end, event):
        if start >= event.end:
            if event.right:
                return self._bookHelper(start, end, event.right)
            else:
                event.right = Event(start, end)
                return True
        elif end <= event.start:
            if event.left:
                return self._bookHelper(start, end, event.left)
            else:
                event.left = Event(start, end)
                return True

        return False 
        
    def book(self, start: int, end: int) -> bool:
        if not self.root:
            self.root = Event(start, end)
            return True
        return self._bookHelper(start, end, self.root)
            
# Your MyCalendar object will be instantiated and called as such:
# obj = MyCalendar()
# param_1 = obj.book(start,end)
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(n)`