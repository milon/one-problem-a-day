---
extends: _layouts.post
section: content
title: Maximum twin sum of a linked list
problemUrl: https://leetcode.com/problems/maximum-twin-sum-of-a-linked-list/
date: 2022-11-26
categories: [linked-list]
---

We will find the middle of the linked list. Then we will reverse the second half of the linked list. Then we will iterate over the first half and the second half of the linked list to find the maximum twin sum.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def pairSum(self, head: Optional[ListNode]) -> int:
        dummy = head
        first, second = dummy, dummy
        
        # finding the middle of list
        while second.next.next:
            first = first.next
            second = second.next.next
        second_half = first.next
        
        # reversing the second hald
        first, second, third = None, None, second_half
        while third:
            first, second, third = second, third, third.next
            second.next = first
        second_half = second
        
        # traversing over first and second half
        max_sum = -math.inf
        while second_half and head:
            max_sum = max(max_sum, second_half.val + head.val)
            head, second_half = head.next, second_half.next
        
        return max_sum
```

Time complexity: `O(n)`, n is the length of the linked list <br/>
Space complexity: `O(1)`

We can also use a duble endend queue to solve the problem. We will iterate over the linked list and add the values to the queue. Then we will iterate over the queue to find the maximum twin sum.

```python
class Solution:
    def pairSum(self, head: Optional[ListNode]) -> int:
        queue = collections.deque()
        while head:
            queue.append(head.val)
            head = head.next
        
        max_sum = -math.inf
        while queue:
            max_sum = max(max_sum, queue.popleft() + queue.pop())
        
        return max_sum
```

Time complexity: `O(n)`, n is the length of the linked list <br/>
Space complexity: `O(n)`