---
extends: _layouts.post
section: content
title: Next greater node in linked list
problemUrl: https://leetcode.com/problems/next-greater-node-in-linked-list/
date: 2022-11-26
categories: [linked-list, stack]
---

We can use a stack to store the nodes. We will iterate over the list from the end to the beginning. We will pop the nodes from the stack until the top node is greater than the current node. We will store the value of the top node in the result array. We will push the current node to the stack. We will reverse the result array and return it.

```python
class Solution:
    def nextLargerNodes(self, head: ListNode) -> List[int]:
        res, stack = [], []
        while head:
            while stack and stack[-1][1] < head.val:
                res[stack.pop()[0]] = head.val
            stack.append([len(res), head.val])
            res.append(0)
            head = head.next
        return res
```

Time complexity: `O(n)`, n is the length of the list <br/>
Space complexity: `O(n)`