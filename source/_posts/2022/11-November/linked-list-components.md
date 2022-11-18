---
extends: _layouts.post
section: content
title: Linked list components
problemUrl: https://leetcode.com/problems/linked-list-components/
date: 2022-11-18
categories: [linked-list]
---

We will create a hashset with the nums. Then we will traverse the linked list and check if the current node is in the hashset. If yes, that means both are connected. We will then traverse the linked list until we find a node that is not in the hashset. We will increment the count by 1. We will continue this process until we reach the end of the linked list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def numComponents(self, head: Optional[ListNode], nums: List[int]) -> int:
        nums = set(nums)
        res = 0
        while head:
            if head.val in nums and (not head.next or head.next.val not in nums):
                res += 1
            head = head.next
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`