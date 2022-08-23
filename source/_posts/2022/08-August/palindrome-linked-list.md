---
extends: _layouts.post
section: content
title: Palindrome linked list
problemUrl: https://leetcode.com/problems/palindrome-linked-list/
date: 2022-08-23
categories: [linked-list]
---

We will iterate over the whole list, and add the result to an array. Then we check whether the array is palindrome or not and return that value.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def isPalindrome(self, head: Optional[ListNode]) -> bool:
        values = []
        while head:
            values.append(head.val)
            head = head.next
        
        l, r = 0, len(values)-1
        while l < r:
            if values[l] != values[r]:
                return False
            l += 1
            r -= 1
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`