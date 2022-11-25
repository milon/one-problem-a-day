---
extends: _layouts.post
section: content
title: Add two numbers II
problemUrl: https://leetcode.com/problems/add-two-numbers-ii/
date: 2022-11-25
categories: [linked-list, stack]
---

We can solve the problem by using stack. We will push the values of the two linked lists into two stacks. Then we will pop the values from the two stacks and add them together. If the sum is greater than 10, we will subtract 10 from the sum and carry 1 to the next sum. We will repeat this process until we reach the end of the two stacks. If we still have carry, we will add a new node with value 1 to the result linked list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def addTwoNumbers(self, l1: Optional[ListNode], l2: Optional[ListNode]) -> Optional[ListNode]:
        stack1, stack2 = [], []
        while l1:
            stack1.append(l1.val)
            l1 = l1.next
        while l2:
            stack2.append(l2.val)
            l2 = l2.next
        
        carry, head = 0, None
        while stack1 or stack2 or carry:
            d1 = stack1.pop() if stack1 else 0
            d2 = stack2.pop() if stack2 else 0
            carry, val = divmod(d1+d2+carry, 10)
            head = ListNode(val, head)
        
        return head
```

Time complexity: `O(n)`, n is the length of the longer linked list <br/>
Space complexity: `O(n)`