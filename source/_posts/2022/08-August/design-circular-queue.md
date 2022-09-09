---
extends: _layouts.post
section: content
title: Design circular queue
problemUrl: https://leetcode.com/problems/design-circular-queue/
date: 2022-08-13
categories: [queue, design]
---

We can implement a circular queue by using an array, the maximum size of the array will be the given input k. Then we will keep 2 pointers, one for head and one for tail, and whenever we enqueue some value, we will do it in the front, and dequeue from the rear.

```python
class MyCircularQueue:
    def __init__(self, k: int):
        self.data = [0] * k
        self.maxSize = k
        self.head = 0
        self.tail = -1

    def enQueue(self, value: int) -> bool:
        if self.isFull(): 
            return False
        
        self.tail = (self.tail + 1) % self.maxSize
        self.data[self.tail] = value
        
        return True

    def deQueue(self) -> bool:
        if self.isEmpty(): 
            return False
        if self.head == self.tail: 
            self.head, self.tail = 0, -1
        else: 
            self.head = (self.head + 1) % self.maxSize
        
        return True

    def Front(self) -> int:
        return -1 if self.isEmpty() else self.data[self.head]

    def Rear(self) -> int:
        return -1 if self.isEmpty() else self.data[self.tail]

    def isEmpty(self) -> bool:
        return self.tail == -1

    def isFull(self) -> bool:
        return not self.isEmpty() and (self.tail + 1) % self.maxSize == self.head

# Your MyCircularQueue object will be instantiated and called as such:
# obj = MyCircularQueue(k)
# param_1 = obj.enQueue(value)
# param_2 = obj.deQueue()
# param_3 = obj.Front()
# param_4 = obj.Rear()
# param_5 = obj.isEmpty()
# param_6 = obj.isFull()
```

Time Complexity: `O(1)` for each operation <br/>
Space Complexity: `O(n)`